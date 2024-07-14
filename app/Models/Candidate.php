<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='candidates';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'job_posting_id',
        'file_cv'
    ];

    public function job_posting()
    {
        return $this->belongsTo(JobPosting::class);
    }
}
