<?php

namespace App\Models;

use App\Models\Card;
use App\Models\User;
use App\Models\Level;
use App\Models\Position;
use App\Models\Religion;
use App\Models\Ethnicity;
use App\Models\Nationality;
use App\Models\StatusEmployee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = [
        'employee_name',
        'date_of_birth',
        'gender',
        'email',
        'phone_number',
        'user_id',
        'card_id',
        'origin',
        'address',
        'religion_id',
        'nationality_id',
        'ethnicity_id',
        'level_id',
        'position_id',
        'status_employee_id'
    ];

    protected $keyType = 'string'; // Đảm bảo kiểu dữ liệu của id là string

    protected $primaryKey = 'id'; // Đặt tên cột là id

    public $incrementing = false; // Tắt tự động tăng

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $latestRecord = Employee::orderBy('id', 'desc')->first();

            if ($latestRecord) {
                $lastId = $latestRecord->id;
                preg_match('/PE(\d+)/', $lastId, $matches);
                if (isset($matches[1])) {
                    $newNumber = intval($matches[1]) + 1;
                } else {
                    $newNumber = 1;
                }
            } else {
                $newNumber = 1;
            }

            $newId = 'PE' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

            $model->id = $newId;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function statusEmployee()
    {
        return $this->belongsTo(StatusEmployee::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    public function ethnicity()
    {
        return $this->belongsTo(Ethnicity::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function contract()
    {
        return $this->hasOne(Contract::class, 'employee_id');
    }

    public function attendance(){
        return $this->hasMany(TimeSheet::class, 'employee_id');
    }
}
