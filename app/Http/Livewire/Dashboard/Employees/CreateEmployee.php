<?php

namespace App\Http\Livewire\Dashboard\Employees;

use App\Constants\Constant;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateEmployee extends Component
{

    public $account, $info;

    public function rules()
    {
        return [
            'account.name' => ['required', 'string', 'max:255', 'unique:users,name'],
            'account.email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'account.password' => ['required', Password::defaults()],
            'info.city' => ['required', 'string'],
            'info.gender' => ['required', 'string', 'in:male,female'],
            'info.phone_number' => ['required', 'numeric', 'digits_between:8,18'],
            'info.age' => ['required', 'numeric', 'digits_between:2,3'],
            'info.address' => ['required', 'string'],
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
                // creating employee account
                $data = array_merge($this->info, [
                    'user_id' => $employee->id,
                    'company_id' => auth()->user()->manager->company->id,
                    'manager_id' => auth()->user()->manager->id,
                ]);
                Employee::firstOrCreate($data);

                // assigning roles
                $role = Role::whereName(Constant::EMPLOYEE)->first();
                $employee->assignRole($role);

                // sending mail
                //! $this->account['password'] = $unhashed;
                //! Mail::to($this->account['email'])->send(new CredentialsMail($this->account));
                $this->reset();
            }

            $this->dispatchBrowserEvent('hideModal');
            $this->emit('toast', 'success', 'Success Notfication', 'Employee saved successfully.');
        } catch (\Exception $e) {
            $this->emit('toast', 'error', 'Exception Occured', 'There was an exception, ' . $e->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.dashboard.employees.create-employee')->extends('layouts.dashboard.app')->section('content');
    }
}
