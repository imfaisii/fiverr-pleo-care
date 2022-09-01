<?php

namespace App\Http\Livewire\Dashboard\Companies;

use App\Constants\Constant;
use App\Mail\Auth\CredentialsMail;
use App\Models\User;
use App\Services\CompanyService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateCompany extends Component
{
    public $companyId, $companyData = [], $account;

    public function rules()
    {
        return [
            'companyId' => 'required',
        ];
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function checkCompany(CompanyService $companyService)
    {
        $this->validate();

        try {
            $response = $companyService->getCompanyData($this->companyId);
            $this->companyData = $response->json();

            if ($response->successful()) {
                $this->account['name'] = $this->companyData['company_name'];
                $this->emit('toast', 'success', 'Success Notfication', 'Company Data fetched successfully.');
            } else $this->emit('toast', 'error', 'Error Notfication', 'There was an error, ' . $this->companyData['errors'][0]['error']);
        } catch (\Exception $e) {
            $this->emit('toast', 'error', 'Exception Occured', 'There was an exception, ' . $e->errorInfo[2] ?? $e->getMessage());
        }
    }

    public function createAccount()
    {
        $this->validate([
            'account.name' => ['required', 'string', 'max:255', 'unique:users,name'],
            'account.email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'account.password' => ['required', Password::defaults()],
        ]);

        try {
            $unhashed = $this->account['password'];
            $this->account['password'] = Hash::make($this->account['password']);

            // creating account
            $company = User::firstOrCreate($this->account);

            if ($company) {
                // creating the company record
                $company->company()->firstOrCreate();

                // assigning roles
                $role = Role::whereName(Constant::COMPANY)->first();
                $company->assignRole($role);

                // sending mail
                $this->account['password'] = $unhashed;
                Mail::to($this->account['email'])->send(new CredentialsMail($this->account));
            }

            $this->dispatchBrowserEvent('hideModal');
            $this->emit('toast', 'success', 'Success Notfication', 'Company Data fetched successfully.');
        } catch (\Exception $e) {
            $this->emit('toast', 'error', 'Exception Occured', 'There was an exception, ' . $e->errorInfo[2] ?? $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.dashboard.companies.create-company')->extends('layouts.dashboard.app')->section('content');;
    }
}
