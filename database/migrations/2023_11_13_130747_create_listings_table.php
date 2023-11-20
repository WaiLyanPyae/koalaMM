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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Reference to the user
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->decimal('price', 10, 2);
            $table->date('available_from');
            $table->date('available_to')->nullable();
            $table->string('property_type');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->text('amenities'); // Can be JSON or delimited text
            $table->integer('max_guests');
            $table->text('house_rules')->nullable();
            $table->text('images')->nullable(); // Can be JSON or delimited text
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};