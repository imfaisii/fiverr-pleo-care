<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{
    public $user;

    public function mount()
    {
        $this->user = User::make();
    }

    public function rules()
    {
        return [
            'user.name' => 'required|regex:/^[\pL\s\-]+$/u',
            'user.email' => 'required|email|unique:users,email',
            'user.password' => 'required|min:8',
            'user.password_confirmation' => 'required|min:8|same:user.password'
        ];
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function store()
    {
        $this->validate();

        $this->user->password = Hash::make($this->user->password);

        $user = $this->user->create($this->user->toArray());

        if ($user) {
            Auth::loginUsingId($user->id);
            $this->emit('toast', 'success', 'Success Notfication', 'User created successfully.');
            $this->reset();
            return redirect()->route('dashboard');
        }

        $this->emit('toast', 'error', 'Error Notification', 'Failed to creaate user.');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.auth.register')
            ->extends('layouts.auth.guest')
            ->section('content');
    }
}
