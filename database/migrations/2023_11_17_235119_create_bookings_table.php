<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // ID of the user who is making the booking
            $table->unsignedBigInteger('listing_id'); // ID of the listing that is being booked
            $table->date('start_date'); // Start date of the booking
            $table->date('end_date'); // End date of the booking
            $table->decimal('total_price', 10, 2); // Total price for the booking
            $table->string('status')->default('pending'); // Status of the booking (e.g., pending, confirmed, cancelled)
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};