<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;
    // Fillable attributes
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'location',
        'price',
        'available_from',
        'available_to',
        'property_type',
        'bedrooms',
        'bathrooms',
        'amenities',
        'max_guests',
        'house_rules',
        'term_type',
        'images'
    ];

    protected $dates = ['available_from', 'available_to'];

    // Casts
    protected $casts = [
        'images' => 'array', // Cast images to an array
        'available_from' => 'datetime',
        'available_to' => 'datetime'
    ];

    /**
     * Get the user that owns the listing.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
