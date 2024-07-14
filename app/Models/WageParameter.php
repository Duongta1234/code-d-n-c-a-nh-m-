<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
class WageParameter extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'base_salary',
        'overtime_rate',
        'holiday_rate',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
