<?php

namespace App\Http\Livewire\Dashboard\RolesAndPermissions;

use Livewire\Component;

class Permissions extends Component
{
    public $permission;

    public function rules()
    {
        return [
            'permission' => 'required|string|unique:permissions,name',
        ];
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function store()
    {
        $this->validate();
        $this->dispatchBrowserEvent('hideModal');
    }
    public function render()
    {
        return view('livewire.dashboard.roles-and-permissions.permissions')->extends('layouts.dashboard.app')->section('content');
    }
}
