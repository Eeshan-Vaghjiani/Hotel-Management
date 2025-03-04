<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    // Specify the fillable fields
    protected $fillable = [
        'room_title',   // Nullable string
        'image',        // Nullable string
        'description',  // Nullable longtext
        'price',        // Nullable string
        'wifi',         // Default 'yes' string
        'room_type',    // Nullable string
    ];
}
