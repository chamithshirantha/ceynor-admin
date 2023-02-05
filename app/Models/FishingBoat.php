<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishingBoat extends Model
{
    protected $table = 'fishing_boats';
    protected $fillable = [
        'boat_name',
        'image',
        'short_description',
        'length',
        'beam',
        'draft',
        'main_hull_beam',
        'fuel',
        'water',
        'seating_capacity',
        'speed',
        'beds',
        'hull_type',
        'fish_hold_capacity',
        'price',
    ];
}
