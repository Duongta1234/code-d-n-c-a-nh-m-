<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InterviewResult extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='interview_results';
    protected $fillable = [
        'candidate_id',
        'interview_schedule_id',
        'result_interview',
        'note'
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function interviewSchedule()
    {
        return $this->belongsTo(InterviewSchedule::class);
    }
}
