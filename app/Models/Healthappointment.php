<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Healthappointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'appointed_employee',
        'user_id',
        'appointed_doctor',
        'appointed_date',
        'appointed_time',
        'appointed_reason',
    ];
}
