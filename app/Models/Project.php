<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'newsand_feeds';
    protected $fillable = [
        'topic',
        'image',
        'description_1',
        'description_2',
        'description_3',
    ];
}
