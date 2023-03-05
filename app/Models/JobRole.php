<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobRole extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'default', 'events', 'company_id'];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($jobRole) {
            $jobRole->payments()->delete();
        });
    }

    public function shifts()
    {
        return $this->hasMany(Shift::class, 'job_role_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function payments()
    {
        return $this->hasMany(JobRolePayment::class);
    }
}
