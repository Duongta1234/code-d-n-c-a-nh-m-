<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'basic_salary_id',
        'quantity_attendance',
        'allowed_leave_days',
        'approved_leave_days',
        'absent_days',
        'deducted_salary',
        'final_salary',
    ];

    public function basicSalary(){
        return $this->belongsTo(BasicSalary::class);
    }
}
