<?php

namespace App\Http\Livewire\Dashboard\Components\Manager;

use App\Models\Employee;
use Livewire\Component;

class CarerLogTimes extends Component
{
    public $carers;

    public function mount()
    {
        $this->carers = Employee::where('manager_id', auth()->user()->manager->id)
            ->with('user')
            ->get();
    }

    public function render()
    {
        return view('livewire.dashboard.components.manager.carer-log-times');
    }
}
