<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Salary;
use Illuminate\Support\Facades\DB;
class BasicSalary extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'month',
        'year',
        'basic_salary'
    ];
    public function salary()
    {
        return $this->belongsTo(Salary::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }


}

