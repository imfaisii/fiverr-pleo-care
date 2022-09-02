<?php

namespace App\Http\Livewire\Dashboard\Shifts\Employees;

use App\Models\Shift;
use Livewire\Component;

class ViewShifts extends Component
{
    public function render()
    {
        return view('livewire.dashboard.shifts.employees.view-shifts', [
            'shifts' => Shift::with('manager.company.user', 'manager.user')->get()
        ])->extends('layouts.dashboard.app')->section('content');
    }
}
