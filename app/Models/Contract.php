<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='contracts';
    protected $fillable = [
        'contract_name',
        'file_pdf',
        'sign_date',
        'effective_date',
        'expiration_date',
        'employee_id',
        'position_id'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}