<?php

namespace App\Http\Livewire\Dashboard\Shifts;

use Livewire\Component;

class ListShifts extends Component
{
    public function render()
    {
        return view('livewire.dashboard.shifts.list-shifts')->extends('layouts.dashboard.app')->section('content');
    }
}
