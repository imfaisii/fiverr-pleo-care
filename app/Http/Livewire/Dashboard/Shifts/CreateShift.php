<?php

namespace App\Http\Livewire\Dashboard\Shifts;

use App\Models\Client;
use Carbon\Carbon;
use Livewire\Component;

class CreateShift extends Component
{
    public $shift, $clientData, $expectedPay;

    public function rules()
    {
        return [
            'shift.name' => ['required', 'string'],
            'shift.hourly_rate' => ['required', 'numeric'],
            'shift.description' => ['required', 'string'],
            'shift.start_time' => ['required'],
            'shift.end_time' => ['required', 'after:shift.start_time'],
            'shift.client_id' => ['required', 'exists:clients,id'],
        ];
    }

    public function updated($property, $value)
    {
        if ($property == 'shift.client_id') $this->clientData = Client::find($value);

        if (!array_diff(['start_time', 'end_time', 'hourly_rate'], array_keys($this->shift))) {
            $startTime = Carbon::parse($this->shift['start_time']);
            $endTime = Carbon::parse($this->shift['end_time']);

            if (filled($this->shift['hourly_rate']) && $startTime->lt($endTime)) {
                $minutes = $startTime->diffInMinutes($endTime);
                $this->expectedPay = ($minutes / 60) * $this->shift['hourly_rate'];
            } else $this->expectedPay = NULL;
        } else $this->expectedPay = NULL;

        $this->validateOnly($property);
    }

    public function store()
    {
        $this->validate();

        try {
            auth()->user()->manager->shifts()->firstOrCreate($this->shift);

            // sending mail
            //! Mail::to($this->account['email'])->send(new CredentialsMail($this->account));

            $this->reset();
            $this->dispatchBrowserEvent('hideModal');
            $this->emit('toast', 'success', 'Success Notfication', 'Shift created successfully.');
        } catch (\Exception $e) {
            $this->emit('toast', 'error', 'Exception Occured', 'There was an exception, ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.dashboard.shifts.create-shift', [
            'clients' => Client::whereBelongsTo(auth()->user()->manager)->get()
        ])->extends('layouts.dashboard.app')->section('content');
    }
}
