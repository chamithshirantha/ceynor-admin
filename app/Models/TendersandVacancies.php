<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TendersandVacancies extends Model
{
    protected $table = 'tendersand_vacancies';
    protected $fillable = [
        'topic',
        'file',
        'description_1',
        'description_2',
        'description_3',
        
    ];
}
