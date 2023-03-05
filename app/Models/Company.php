<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function managers()
    {
        return $this->hasMany(Manager::class);
    }

    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }

    public function jobRoles()
    {
        return $this->hasMany(JobRole::class);
    }
}
