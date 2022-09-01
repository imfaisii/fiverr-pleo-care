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
            $employee = User::firstOrCreate($this->account);

            if ($employee) {
                // creating foreign keys
                Employee::firstOrCreate([
                    'user_id' => $employee->id,
                    'company_id' => auth()->user()->manager->company->id,
                    'manager_id' => auth()->user()->manager->id,
                ]);

                // assigning roles
                $role = Role::whereName(Constant::EMPLOYEE)->first();
                $employee->assignRole($role);

                // sending mail
                //! $this->account['password'] = $unhashed;
                //! Mail::to($this->account['email'])->send(new CredentialsMail($this->account));
                $this->emit('dt');
            }

            $this->dispatchBrowserEvent('hideModal');
            $this->emit('toast', 'success', 'Success Notfication', 'Employee saved successfully.');
        } catch (\Exception $e) {
            $this->emit('toast', 'error', 'Exception Occured', 'There was an exception, ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.dashboard.employees.list-employees')->extends('layouts.dashboard.app')->section('content');
    }
}
