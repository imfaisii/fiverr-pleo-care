<?php

namespace App\Http\Livewire\Dashboard\Clients;

use Livewire\Component;

class CreateClient extends Component
{
    public $client;

    public function rules()
    {
        return [
            'client.name' => ['required', 'string'],
            'client.email' => ['required', 'email', 'unique:clients,email'],
            'client.city' => ['required', 'string'],
            'client.gender' => ['required', 'string', 'in:male,female'],
            'client.phone_number' => ['required', 'numeric', 'digits_between:8,18'],
            'client.age' => ['required', 'numeric', 'digits_between:2,3'],
            'client.address' => ['required', 'string'],
        ];
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function addClient()
    {
        $this->validate();
        
        try {
            auth()->user()->manager->clients()->firstOrCreate($this->client);

            // sending mail
            //! Mail::to($this->account['email'])->send(new CredentialsMail($this->account));

            $this->reset();
            $this->dispatchBrowserEvent('hideModal');
            $this->emit('toast', 'success', 'Success Notfication', 'Client saved successfully.');
        } catch (\Exception $e) {
            $this->emit('toast', 'error', 'Exception Occured', 'There was an exception, ' . $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.dashboard.clients.create-client')->extends('layouts.dashboard.app')->section('content');
    }
}
