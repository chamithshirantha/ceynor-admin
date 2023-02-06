<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $fillable = [
        'project_name',
        'start',
        'end',
        'status',
        'location',
        'image',
        'short_description',
        'description',
        
    ];
}
