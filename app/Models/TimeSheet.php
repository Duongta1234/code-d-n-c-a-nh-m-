<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
class TimeSheet extends Model
{
    use HasFactory;
    protected $table='timesheets';
    protected $fillable = [
        'employee_id',
        'time_in',
        'time_out',
        'overtime',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
