<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $table='levels';
    protected $fillable = [
        'education_name',
        'school',
        'foreign_language',
        'graduation_year',
        'specialize_name',
        'type_of_expertise'
    ];
}
