<?php

namespace App\Http\Livewire\Dashboard\Shifts\Employees;

use App\Models\Client;
use App\Models\Company;
use App\Models\Shift;
use Livewire\Component;

class ViewShifts extends Component
{
    public $company;
    public $start_time;
    public $end_time;
    public $client;
    public $limit = 10;

    protected $queryString = [
        'company' => ['except' => ''],
        'start_time' => ['except' => ''],
        'end_time' => ['except' => ''],
        'client' => ['except' => ''],
        'limit' => ['except' => '']
    ];

    public function sendProposal(Shift $shift)
    {
        $shift->submitProposal(auth()->user()->employee->id, $shift->id, $shift->company_id);
    }

    public function render()
    {
        $query = Shift::query();

        if (filled($this->company)) $query->where('company_id', $this->company);

        if (filled($this->client)) $query->where('client_id', $this->client);

        if (filled($this->start_time) && filled($this->end_time)) {
            $query->where(function ($query) {
                $query->whereBetween('start_time', [$this->start_time, $this->end_time])
                    ->orWhereBetween('end_time', [$this->start_time, $this->end_time]);
            });
        } else {
            $query->where('start_time', '>', now());
        }

        $query
            ->with(['company.user', 'manager.company.user', 'manager.user', 'jobRole'])
            ->latest()
            ->limit($this->limit);

        return view('livewire.dashboard.shifts.employees.view-shifts', [
            'shifts' => $query->get(),
            'companies' => Company::with('user')->get(),
            'clients' => Client::all()
        ])
            ->extends('layouts.dashboard.app')->section('content');
    }
}
