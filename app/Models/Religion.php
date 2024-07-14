<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Religion extends Model
{
    use HasFactory;
    // trỏ đến tên bảng
    protected $table= 'religions';
    // Thêm các trường của bảng để add
    protected $fillable = [
        'id','religion_name','religion_another_name'
    ];
}
