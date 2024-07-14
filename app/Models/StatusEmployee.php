<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatusEmployee extends Model
{
    use HasFactory;
    protected $table='status_employees';
    protected $fillable = [
        'id',
        'start_date',
        'end_date',
        'status',
        'employee_id'
    ];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
