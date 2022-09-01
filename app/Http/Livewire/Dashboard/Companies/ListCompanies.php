<?php

namespace App\Http\Livewire\Dashboard\Companies;

use Livewire\Component;

class ListCompanies extends Component
{
    public function render()
    {
        return view('livewire.dashboard.companies.list-companies')->extends('layouts.dashboard.app')->section('content');;
    }
}
