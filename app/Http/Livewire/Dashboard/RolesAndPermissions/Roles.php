<?php

namespace App\Http\Livewire\Dashboard\RolesAndPermissions;

use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    public function deleteRole($id)
    {
        Role::find($id)->delete();
        $this->emit('toast', 'success', 'Success Notfication', 'Roles was deleted successfully.');
    }
    
    public function render()
    {
        return view('livewire.dashboard.roles-and-permissions.roles', [
            'roles' => Role::all()
        ])->extends('layouts.dashboard.app')->section('content');
    }
}
