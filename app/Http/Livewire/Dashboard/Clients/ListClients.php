<?php

namespace App\Http\Livewire\Dashboard\Clients;

use Livewire\Component;

class ListClients extends Component
{
    public function render()
    {
        return view('livewire.dashboard.clients.list-clients')->extends('layouts.dashboard.app')->section('content');
    }
}
