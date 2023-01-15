<?php

namespace App\Http\Livewire\Dashboard\Shifts;

use App\Models\Client;
use App\Models\JobRole;
use Carbon\Carbon;
use Exception;
use Livewire\Component;
use Ramsey\Uuid\Uuid;

class CreateShift extends Component
{
    public $shift, $clientData, $expectedPay, $clients, $jobRoles;

    public function mount()
    {
        $this->shift['uuid'] = \Illuminate\Support\Str::uuid()->toString();
        $this->clients = Client::whereBelongsTo(auth()->user()->manager)->get();
        $this->jobRoles = JobRole::where('company_id', auth()->user()->manager->company->id)->get();

        // hard coding
        $this->shift['address_latitude'] = '32.596003';
        $this->shift['address_longitude'] = '74.0835607';
        $this->shift['address_address'] = 'Gujrat, Pakistan';
    }

    public function rules()
    {
        return [
            'shift.name' => ['required', 'string'],
            'shift.job_role_id' => ['required', 'exists:job_roles,id'],
            'shift.description' => ['required', 'string'],
            'shift.start_time' => ['required'],
            'shift.end_time' => ['required', 'after:shift.start_time'],
            'shift.client_id' => ['required', 'exists:clients,id'],
            // 'shift.address_address' => ['required'],
            // 'shift.address_longitude' => ['required'],
            // 'shift.address_latitude' => ['required'],
        ];
    }

    public function updated($property, $value)
    {
        if ($property == 'shift.client_id') {
            $this->clientData = Client::find($value);
        }

        if (!array_diff(['start_time', 'end_time', 'hourly_rate'], array_keys($this->shift))) {
            $startTime = Carbon::parse($this->shift['start_time']);
            $endTime = Carbon::parse($this->shift['end_time']);

            if (filled($this->shift['hourly_rate']) && $startTime->lt($endTime)) {
                $minutes = $startTime->diffInMinutes($endTime);
                $this->expectedPay = ($minutes / 60) * $this->shift['hourly_rate'];
            } else {
                $this->expectedPay = null;
            }

        } else {
            $this->expectedPay = null;
        }

        $this->validateOnly($property);
    }

    public function store()
    {
        $this->validate();

        try {
            auth()->user()->manager->shifts()->firstOrCreate($this->shift);

            // sending mail
            //! Mail::to($this->account['email'])->send(new CredentialsMail($this->account));

            $this->resetExcept(['clients', 'jobRoles']);
            $this->emit('toast', 'success', 'Success Notfication', 'Shift created successfully.');
            $this->shift['uuid'] = \Illuminate\Support\Str::uuid()->toString();
        } catch (Exception $e) {
            $this->emit('toast', 'error', 'Exception Occured', 'There was an exception, ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.dashboard.shifts.create-shift')
            ->extends('layouts.dashboard.app')
            ->section('content');
    }
}
