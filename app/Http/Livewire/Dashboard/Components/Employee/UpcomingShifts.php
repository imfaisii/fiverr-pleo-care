<?php

namespace App\Http\Livewire\Dashboard\Components\Employee;

use App\Models\Shift;
use Livewire\Component;

class UpcomingShifts extends Component
{
    public $shifts;

    public function mount()
    {
        $this->shifts = Shift::where('status', 'active')
            ->where('start_time', '>', now())
            ->with('client')
            ->get();
    }

    public function render()
    {
        return view('livewire.dashboard.components.employee.upcoming-shifts');
    }
}
