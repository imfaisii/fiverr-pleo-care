<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'phone_number', 'email', 'city', 'gender', 'age', 'manager_id'
    ];

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }
}
