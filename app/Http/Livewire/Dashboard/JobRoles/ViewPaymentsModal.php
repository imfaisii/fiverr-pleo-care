<?php

namespace App\Http\Livewire\Dashboard\JobRoles;

use App\Models\JobRole;
use Livewire\Component;

class ViewPaymentsModal extends Component
{
    protected $listeners = ['viewJobRolePayments', 'onModalHidden'];

    public $jobRole = null;

    public function viewJobRolePayments(JobRole $jobRole)
    {
        $this->jobRole = $jobRole->load('payments');
    }

    public function onModalHidden()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.dashboard.job-roles.view-payments-modal');
    }
}
