<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Card extends Model
{
    use HasFactory;
    protected $table='cards';
    protected $fillable = [
        'citizen_identity_card',
        'place_of_issue',
        'issue_date',
        'previous_image',
        'behind_image'
    ];

    public function employee(){
        return $this->hasOne(Employee::class);
    }
}
