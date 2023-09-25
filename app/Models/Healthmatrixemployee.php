<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Healthmatrixemployee extends Model
{
    use HasFactory;
    protected $fillable=[
        'actionable_employee',
        'user_id',
        'progress',
    ];
}
