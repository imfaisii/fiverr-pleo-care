<?php

namespace App\Http\Livewire\Dashboard\Components\Employee;

use App\Models\Shift;
use Carbon\Carbon;
use Livewire\Component;

class CardsComponent extends Component
{
    public $data = [];

    public function mount()
    {
        $this->data['monthly_minutes'] = $this->getEmployeeMinutes(now()->startOfMonth(), now()->endOfMonth());
        $this->data['weekly_minutes'] = $this->getEmployeeMinutes(now()->startOfWeek(), now()->endOfWeek());
    }

    public function getEmployeeMinutes(Carbon $start, Carbon $end): int
    {
        $rows = Shift::where('employee_id', auth()->user()->employee->id)
            ->completed()
            ->where(function ($query) use ($start, $end) {
                $query->whereBetween('start_time', [$start, $end])
                    ->orWhereBetween('end_time', [$start, $end]);
            })
            ->get();

        return $rows->sum('total_shift_hours');
    }

    public function render()
    {
        return view('livewire.dashboard.components.employee.cards-component');
    }
}
