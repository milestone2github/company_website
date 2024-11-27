<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model; // Use MongoDB Eloquent model

class Otp extends Model
{
    protected $connection = 'mongodb'; // Use MongoDB connection
    protected $collection = 'otps';   // MongoDB collection name

    protected $fillable = [
        'phone',
        'otp',
        'expires_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime', // Automatically cast to Carbon instances
    ];
}
