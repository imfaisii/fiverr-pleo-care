<?php

namespace App\Http\Livewire\Dashboard\JobRoles;

use Livewire\Component;

class ListJobRoles extends Component
{
    public function render()
    {
        return view('livewire.dashboard.job-roles.list-job-roles')->extends('layouts.dashboard.app')->section('content');
    }
}
