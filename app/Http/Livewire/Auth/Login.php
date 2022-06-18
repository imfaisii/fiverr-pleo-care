<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use FFI\Exception;
use Illuminate\Support\Facades\Auth;
use Dotenv\Exception\ValidationException;

class Login extends Component
{

    public $user;

    public function mount()
    {
        $this->user = User::make();
    }

    public function rules()
    {
        return [
            'user.email' => 'required|email|exists:users,email',
            'user.password' => 'required'
        ];
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function store()
    {
        $this->validate();

        $db = User::whereEmail($this->user->email)->first();

        if (Hash::check($this->user->password, $db->password)) {
            Auth::loginUsingId($db->id);
            return redirect()->route('dashboard');
        }
        
        $this->addError('credentials', "Invalid credentials , please try again.");
    }
    public function render()
    {
        return view('livewire.auth.login')
            ->extends('layouts.auth.guest')
            ->section('content');
    }
}
