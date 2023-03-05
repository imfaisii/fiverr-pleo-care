<?php

namespace App\Http\Livewire\Dashboard\Shifts;

use Livewire\Component;

class Proposals extends Component
{
    public function render()
    {
        return view('livewire.dashboard.shifts.proposals')
            ->extends('layouts.dashboard.app')
            ->section('content');
    }
}
