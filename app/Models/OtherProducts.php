<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherProducts extends Model
{
    protected $table = 'other_products';
    protected $fillable = [
        'product_name',
        'image',
        'length',
        'width',
        'height',
        'price',
        'short_description',
        'description',   
    ];
}
