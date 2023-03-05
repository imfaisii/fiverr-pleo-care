<?php

namespace App\Http\Livewire\Dashboard\Components\Company;

use App\Constants\Constant;
use App\Models\Shift;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ShiftsGraph extends Component
{
    public $companyId, $shifts, $shiftsByStaff, $graphData = [];

    public function mount()
    {
        $this->companyId =
            auth()->user()->top_role == Constant::MANAGER
            ? auth()->user()->manager->company_id
            : auth()->user()->company->id;

        [$this->graphData['statuses'], $this->graphData['totalShifts']] = $this->getShiftsGraphData();
        $this->shifts = Shift::where('company_id', $this->companyId)->with('manager.user')->get();
        $this->shiftsByStaff = $this->shifts->groupBy('manager_id')->toArray();
    }

    public function getShiftsGraphData()
    {
        $shifts = Shift::select('status', DB::raw('count(*) as total'))
            ->where('company_id', $this->companyId)
            ->groupBy('status')
            ->get();

        $statuses = $shifts->map(fn ($shift) => $shift['status']->key);
        $totalShifts = $shifts->map(fn ($shift) => $shift['total']);

        return [$statuses, $totalShifts];
    }

    public function render()
    {
        return view('livewire.dashboard.components.company.shifts-graph');
    }
}
