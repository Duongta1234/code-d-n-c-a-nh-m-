<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InterviewSchedule extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='interview_schedule';
    protected $fillable = [
        'user_id',
        'candidate_id',
        'interview_time',
        'interview_location',
        'status'
    ];
    public function candidate()
    {
        return $this->belongsTo(Candidate::class,'candidate_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
