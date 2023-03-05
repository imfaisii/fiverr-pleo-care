<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class ShiftFeedback extends Model
{
    use HasFactory;

    public $fillable = [
        'comments',
        'rating',
        'shift_id',
    ];

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }
}
