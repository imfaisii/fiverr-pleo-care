<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobRolePayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'day',
        'day_number',
        'from_time',
        'to_time',
        'payment_amount',
        'is_full_day',
        'job_role_id',
    ];

    protected $dates = ['from_time', 'to_time'];
}
