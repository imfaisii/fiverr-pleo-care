<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    public $fillable = [
        'bio',
        'facebook_url',
        'twitter_url',
        'skype_url',
        'instagram_url',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
