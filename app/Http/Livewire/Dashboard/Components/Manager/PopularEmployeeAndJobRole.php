<?php

namespace App\Http\Livewire\Dashboard\Components\Manager;

use App\Models\Employee;
use App\Models\JobRole;
use App\Models\Shift;
use Livewire\Component;

class PopularEmployeeAndJobRole extends Component
{
    public $employee, $jobRole, $clients;

    public function mount()
    {
        $this->jobRole = JobRole::where('company_id', auth()->user()->manager->company_id)
            ->withCount('shifts')
            ->get()
            ->max(fn ($item) => [
                'id' => $item['id'],
                'name' => $item['name'],
                'count' => $item['shifts_count']
            ]);

        $this->employee = Employee::where('manager_id', auth()->user()->manager->id)
            ->with('user')
            ->withCount('shifts')
            ->get()
            ->max(fn ($item) => [
                'name' => $item['user']['name'],
                'email' => $item['user']['email'],
                'phone_number' => $item['user']['phone_number'],
                'days_since_join' => $item['user']['days_since_join'],
                'count' => $item['shifts_count']
            ]);

        $this->clients = Shift::where('company_id', auth()->user()->manager->company_id)
            ->where('job_role_id', $this->jobRole['id'])
            ->with('client')
            ->latest()
            ->get()
            ->groupBy('client_id')
            ->toArray();
    }

    public function render()
    {
        return view('livewire.dashboard.components.manager.popular-employee-and-job-role');
    }
}
