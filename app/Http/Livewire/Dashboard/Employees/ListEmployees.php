<?php

namespace App\Http\Livewire\Dashboard\Employees;

use App\Constants\Constant;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class ListEmployees extends Component
{
    public function render()
    {
        return view('livewire.dashboard.employees.list-employees')->extends('layouts.dashboard.app')->section('content');
    }
}
