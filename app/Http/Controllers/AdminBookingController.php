<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    // Display a listing of the bookings
    public function index()
    {
        $bookings = Booking::with(['user', 'listing'])->paginate(10);
        return view('auth.admin.bookings.index', compact('bookings'));
    }

    // public function create()
    // {
    //     // Return a view to create a new booking
    // }

    // public function store(Request $request)
    // {
    //     // Validate and store the booking
    // }

    // Show the form for editing the specified booking
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        return view('auth.admin.bookings.edit', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
    
        $booking = Booking::with('listing')->findOrFail($id);
        $start_date = Carbon::parse($request->start_date);
        $end_date = Carbon::parse($request->end_date);
        $duration = $start_date->diffInDays($end_date);
    
        // Calculate the new total price
        $totalPrice = $duration * $booking->listing->price;
    
        $booking->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_price' => $totalPrice,
        ]);
    
        return redirect()->route('admin.bookings.index')->with('success', 'Booking updated successfully.');
    }
    

    // Remove the specified booking from storage
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully.');
    }
}
