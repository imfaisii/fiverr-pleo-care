<?php

namespace App\Models;

use App\Enums\ShiftsEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'name',
        'description',
        'hourly_rate',
        'start_time',
        'end_time',
        'address_address',
        'address_longitude',
        'address_latitude',
        'status',
        'expected_pay',
        'job_role_id',
        'client_id',
        'employee_id',
        'manager_id',
    ];

    protected $casts = [
        'status' => ShiftsEnum::class,
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    protected $appends = [
        'total_shift_hours'
    ];

    public function submitProposal($employeeId, $shiftId, $companyId)
    {
        ShiftProposal::firstOrCreate([
            'employee_id' => $employeeId,
            'shift_id' => $shiftId,
            'company_id' => $companyId,
        ]);
    }

    public function scopeActive($query)
    {
        return $query->where('status', ShiftsEnum::ACTIVE);
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', ShiftsEnum::COMPLETED);
    }

    public function scopeCancelled($query)
    {
        return $query->where('status', ShiftsEnum::CANCELLED);
    }

    public function getTotalShiftHoursAttribute()
    {
        return number_format($this->start_time->diffInMinutes($this->end_time) / 60, 2);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function feedbacks()
    {
        return $this->hasOne(ShiftFeedback::class);
    }

    public function checkIns()
    {
        return $this->hasMany(ShiftCheckIn::class, 'shift_id', 'id');
    }

    public function jobRole()
    {
        return $this->belongsTo(JobRole::class);
    }

    public function proposals()
    {
        return $this->hasMany(ShiftProposal::class, 'shift_id', 'id');
    }
}
