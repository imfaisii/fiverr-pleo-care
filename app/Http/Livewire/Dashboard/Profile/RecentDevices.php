<?php

namespace App\Http\Livewire\Dashboard\Profile;

use App\Models\User;
use Livewire\Component;

class RecentDevices extends Component
{
    public $recentDevices = [];

    public function mount()
    {
        $this->recentDevices = auth()->user()->getUserAgents();
    }

    public function render()
    {
        return view('livewire.dashboard.profile.recent-devices');
    }
}
