<?php

namespace App\Http\Livewire\Dashboard\Components\Company;

use App\Constants\Constant;
use App\Models\Shift;
use Livewire\Component;

class ShiftsFeedback extends Component
{
    public $shiftsWithFeedbacks, $companyId;

    public function mount()
    {
        $this->companyId =
            auth()->user()->top_role == Constant::MANAGER
            ? auth()->user()->manager->company_id
            : auth()->user()->company->id;

        $this->shiftsWithFeedbacks = Shift::where('company_id', $this->companyId)
            ->with(['feedbacks', 'client'])
            ->get();
    }
    public function render()
    {
        return view('livewire.dashboard.components.company.shifts-feedback');
    }
}
