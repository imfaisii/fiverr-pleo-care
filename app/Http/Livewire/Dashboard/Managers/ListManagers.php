<?php

namespace App\Http\Livewire\Dashboard\Managers;

use App\Constants\Constant;
use App\Mail\Auth\CredentialsMail;
use App\Models\Manager;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class ListManagers extends Component
{
    public $account;

    public function rules()
    {
        return [
            'account.name' => ['required', 'string', 'max:255', 'unique:users,name'],
            'account.email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'account.password' => ['required', Password::defaults()],
        ];
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function createAccount()
    {
        $this->validate();

        try {
            $unhashed = $this->account['password'];
            $this->account['password'] = Hash::make($this->account['password']);
            $manager = User::firstOrCreate($this->account);

            if ($manager) {
                // creating foreign keys
                Manager::firstOrCreate([
                    'user_id' => $manager->id,
                    'company_id' => auth()->user()->company->id
                ]);

                // assigning roles
                $role = Role::whereName(Constant::MANAGER)->first();
                $manager->assignRole($role);

                // sending mail
                //! $this->account['password'] = $unhashed;
                //! Mail::to($this->account['email'])->send(new CredentialsMail($this->account));
                $this->emit('dt');
            }

            $this->dispatchBrowserEvent('hideModal');
            $this->emit('toast', 'success', 'Success Notfication', 'Manager saved successfully.');
        } catch (\Exception $e) {
            $this->emit('toast', 'error', 'Exception Occured', 'There was an exception, ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.dashboard.managers.list-managers')->extends('layouts.dashboard.app')->section('content');
    }
}
