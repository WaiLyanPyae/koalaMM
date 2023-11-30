<?php

use App\Http\Middleware\IsHost;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\HostAuthController;
use App\Http\Controllers\AdminHostController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\HostDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landingpage');
})->name('landing');

Route::get('/', [HomeController::class, 'index'])->name('landing');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contact/submit', 'ContactController@submit')->name('contact.submit');

Route::get('/cancellation-policy', function () {
    return view('cancellation-policy');
})->name('cancellation-policy');

// Listings
Route::get('/listings', [ListingController::class, 'index'])->name('listings.index');
Route::get('/listings/{id}', [ListingController::class, 'show'])->name('listings.show');
// Route::get('/listings/search', [ListingController::class, 'search'])->name('listings.search');
// Route::get('/listings/search', [ListingController::class, 'search'])->name('listings.search');

// User Auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin']);

Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/signup', [AuthController::class, 'postSignup']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'showDash'])->name('dashboard');
    Route::put('/auth/update', [AuthController::class, 'update'])->name('user.update');
});

// Host Auth routes
Route::get('/host/signup', [HostAuthController::class, 'showSignupForm'])->name('host.signup');
Route::post('/host/signup', [HostAuthController::class, 'signup']);
Route::get('/host/login', [HostAuthController::class, 'showLoginForm'])->name('host.login');
Route::post('/host/login', [HostAuthController::class, 'login']);

// Host Dashboard and Listings routes
Route::middleware(['auth', 'isHost'])->prefix('host')->group(function () {
    Route::get('/dashboard', [HostDashboardController::class, 'index'])->name('host.dashboard');
    Route::get('/listings/create', [HostDashboardController::class, 'create'])->name('host.listings.create');
    Route::post('/listings', [HostDashboardController::class, 'store'])->name('host.listings.store');
    Route::get('/listings/{id}/edit', [HostDashboardController::class, 'edit'])->name('host.listings.edit');
    Route::put('/listings/{id}', [HostDashboardController::class, 'update'])->name('host.listings.update');
    Route::delete('/listings/{id}', [HostDashboardController::class, 'destroy'])->name('host.listings.destroy');
});

// Admin Only
Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login']);

Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('/users', AdminUserController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);
    Route::resource('/hosts', AdminHostController::class)->names([
        'index' => 'admin.hosts.index',
        'create' => 'admin.hosts.create',
        'store' => 'admin.hosts.store',
        'edit' => 'admin.hosts.edit',
        'update' => 'admin.hosts.update',
        'destroy' => 'admin.hosts.destroy',
    ]);
    Route::get('/hosts/{id}/listings', [AdminHostController::class, 'showListings'])->name('admin.hosts.listings');
    
    Route::resource('/bookings', AdminBookingController::class)->names([
        'index' => 'admin.bookings.index',
        'edit' => 'admin.bookings.edit',
        'update' => 'admin.bookings.update',
        'destroy' => 'admin.bookings.destroy',
    ]);
});

Route::get('/my-bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/{booking}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
Route::put('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');
Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');
Route::get('/bookings/{booking}/pay', [BookingController::class, 'showPaymentForm'])->name('bookings.pay');
Route::post('/bookings/{booking}/processPayment', [BookingController::class, 'processPayment'])->name('bookings.processPayment');

Route::post('/listings/{listing}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/listings/{listing}/reviews', [ReviewController::class, 'index'])->name('reviews.index');

// // Test 403 error
// Route::get('/test-403', function () {
//     abort(403);
// });

// // Test 404 error
// Route::get('/test-404', function () {
//     abort(404);
// });

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
