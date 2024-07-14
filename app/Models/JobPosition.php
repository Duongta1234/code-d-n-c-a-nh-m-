<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobPosition extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='job_position';
    protected $fillable = [
        'title',
        'description',
        'quantity'
    ];
}
