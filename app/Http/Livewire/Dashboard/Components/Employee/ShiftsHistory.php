<?php

namespace App\Http\Livewire\Dashboard\Components\Employee;

use App\Models\Shift;
use Livewire\Component;

class ShiftsHistory extends Component
{
    public $shifts;

    public function mount()
    {
        $this->shifts = Shift::where('employee_id', auth()->user()->employee->id)
            ->with('checkIns')
            ->get();
    }

    public function render()
    {
        return view('livewire.dashboard.components.employee.shifts-history');
    }
}
