<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobPosting extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='job_postings';
    protected $fillable = [
        'title',
        'description',
        'request',
        'salary',
        'benefit',
        'working_time',
        'address',
        'application_deadline',
        'contact',
        'status',
        'job_position_id',
        'user_id'
    ];

    public function job_position()
    {
        return $this->belongsTo(JobPosition::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
