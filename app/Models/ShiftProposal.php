<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class ShiftProposal extends Model
{
    use HasFactory;

    public $fillable = [
        'shift_id',
        'employee_id',
        'manager_id',
        'company_id',
        'status'
    ];

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
