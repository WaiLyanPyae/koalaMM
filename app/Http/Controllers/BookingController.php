<?php

namespace App\Http\Controllers;

use Log;
use Carbon\Carbon;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Booking;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Stripe\Exception\CardException;

class BookingController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $bookings = Booking::where('user_id', $userId)->get();

        return view('bookings.index', compact('bookings'));
    }

    public function store(Request $request)
    {
        // Check if the user is authenticated
        if (!auth()->check()) {
            // Redirect to login with an error message
            return redirect()->route('login')->withErrors(['login_required' => 'You must be logged in to make a booking.']);
        }

        $request->validate([
            'listing_id' => 'required|exists:listings,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        try {
            $listing = Listing::findOrFail($request->listing_id);

            // Check for booking overlaps
            $existingBookings = Booking::where('listing_id', $request->listing_id)
                ->where(function ($query) use ($request) {
                    $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                        ->orWhereBetween('end_date', [$request->start_date, $request->end_date]);
                })->count();

            if ($existingBookings > 0) {
                return redirect()->back()->withErrors(['error' => 'Selected dates are already booked.']);
            }

            $start_date = Carbon::parse($request->start_date);
            $end_date = Carbon::parse($request->end_date);
            $duration = $start_date->diffInDays($end_date);

            $totalPrice = $duration * $listing->price;

            DB::transaction(function () use ($request, $totalPrice) {
                $booking = new Booking();
                $booking->user_id = auth()->id();
                $booking->listing_id = $request->listing_id;
                $booking->start_date = $request->start_date;
                $booking->end_date = $request->end_date;
                $booking->total_price = $totalPrice;
                $booking->save();
            });

            return redirect()->route('bookings.index')->with('success', 'Booking successful!');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->withErrors(['error' => 'Listing not found.']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while processing your booking.']);
        }
    }

    public function edit($id)
    {
        try {
            $booking = Booking::findOrFail($id);
            return view('bookings.edit', compact('booking'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('bookings.index')->withErrors(['error' => 'Booking not found.']);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        try {
            $booking = Booking::findOrFail($id);

            // Check for booking overlaps, excluding the current booking
            $existingBookings = Booking::where('listing_id', $booking->listing_id)
                ->where('id', '!=', $id)
                ->where(function ($query) use ($request) {
                    $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                        ->orWhereBetween('end_date', [$request->start_date, $request->end_date]);
                })->count();

            if ($existingBookings > 0) {
                return redirect()->back()->withErrors(['error' => 'Selected dates are already booked.']);
            }

            // Calculate the total price
            $start_date = Carbon::parse($request->start_date);
            $end_date = Carbon::parse($request->end_date);
            $duration = $start_date->diffInDays($end_date);
            $totalPrice = $duration * $booking->listing->price;

            // Update the booking
            $booking->update([
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'total_price' => $totalPrice,
            ]);

            return redirect()->route('bookings.index')->with('success', 'Booking updated successfully!');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->withErrors(['error' => 'Booking not found.']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating your booking.']);
        }
    }

    public function destroy($id)
    {
        try {
            $booking = Booking::findOrFail($id);
            $booking->delete();

            return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully!');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->withErrors(['error' => 'Booking not found.']);
        }
    }

    public function showPaymentForm($id)
    {
        $booking = Booking::findOrFail($id);

        // Ensure the user is the one who made the booking
        if (auth()->id() !== $booking->user_id) {
            return redirect()->route('bookings.index')->withErrors('You are not authorized to view this page.');
        }

        return view('bookings.pay', compact('booking'));
    }

    public function processPayment(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        // Check if the booking is already paid or confirmed
        if ($booking->status === 'confirmed') {
            return back()->withErrors(['error' => 'This booking is already confirmed.']);
        }

        // Set Stripe API key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Process the payment
            $charge = Charge::create([
                'amount' => $booking->total_price * 100, // Convert to cents
                'currency' => 'aud',
                'source' => $request->stripeToken,
                'description' => 'Payment for Booking #' . $booking->id,
            ]);

            // Payment succeeded, update booking status to 'confirmed'
            $booking->update(['status' => 'confirmed']);

            return redirect()->route('bookings.index')->with('success', 'Payment successful!');
        } catch (CardException $e) {
            // Handle card declined exception here
            $booking->update(['status' => 'cancelled']);

            return redirect()->route('bookings.index')->withErrors(['error' => 'Payment failed or was cancelled.']);
        } catch (\Exception $e) {
            // Handle other exceptions
            return redirect()->route('bookings.index')->withErrors(['error' => $e->getMessage()]);
        }
    }
}
