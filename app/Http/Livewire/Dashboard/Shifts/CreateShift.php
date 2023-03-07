<?php

namespace App\Http\Livewire\Dashboard\Shifts;

use App\Models\Client;
use App\Models\JobRole;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Exception;
use Livewire\Component;

use function PHPUnit\Framework\isEmpty;

class CreateShift extends Component
{
    public $shift,
        $clientData,
        $expectedPay,
        $clients,
        $jobRoles,
        $description,
        $address,
        $address_longitude,
        $address_latitude;

    public function mount()
    {
        $this->shift['uuid'] = \Illuminate\Support\Str::uuid()->toString();
        $this->clients = Client::whereBelongsTo(auth()->user()->manager)->get();
        $this->jobRoles = JobRole::where('company_id', auth()->user()->manager->company->id)->get();
    }

    public function rules()
    {
        return [
            'shift.name' => ['required', 'string'],
            'shift.job_role_id' => ['required', 'exists:job_roles,id'],
            'shift.start_time' => ['required', 'after:now'],
            'shift.end_time' => ['required', 'after:shift.start_time'],
            'shift.client_id' => ['required', 'exists:clients,id'],
            'address' => ['required'],
            'address_longitude' => ['required'],
            'address_latitude' => ['required'],
            'description' => ['required', 'string'],
        ];
    }

    public function updated($property, $value)
    {
        if ($property == 'description') {
            $this->shift['description'] = $value;
        }

        if ($property == 'address') {
            $this->shift['address_address'] = $value;
        }

        if ($property == 'address_longitude') {
            $this->shift['address_longitude'] = $value;
        }

        if ($property == 'address_latitude') {
            $this->shift['address_latitude'] = $value;
        }

        if ($property == 'shift.client_id') {
            $this->clientData = Client::find($value);
        }

        if (!array_diff(['start_time', 'end_time', 'job_role_id'], array_keys($this->shift))) {
            $totalPay = 0;
            $startTime = Carbon::parse($this->shift['start_time']);
            $endTime = Carbon::parse($this->shift['end_time']);
            $employeeJobDaysArray = getDays([
                'start_time' => $startTime,
                'end_time' => $endTime,
            ]);
            $jobRole = JobRole::find($this->shift['job_role_id'])->with('payments')->first();
            $defaultPay = $jobRole->default;
            $perDayPayments = $jobRole->payments;

            $totalPay = getExpectedPayOfShift($employeeJobDaysArray, $perDayPayments, $totalPay, $defaultPay);

            $this->expectedPay = number_format($totalPay, 2);
            $this->shift['expected_pay'] = $this->expectedPay;
        } else {
            $this->expectedPay = null;
        }

        $this->validateOnly($property);
    }

    public function store()
    {
        $this->validate();

        try {
            $this->shift['company_id'] = auth()->user()->manager->company_id;
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
