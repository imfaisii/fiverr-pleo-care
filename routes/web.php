<?php

use App\Http\Livewire\Dashboard\Companies\CreateCompany;
use App\Http\Livewire\Dashboard\Companies\ListCompanies;
use App\Http\Livewire\Dashboard\Employees\ListEmployees;
use App\Http\Livewire\Dashboard\Home;
use App\Http\Livewire\Dashboard\Managers\CreateManager;
use App\Http\Livewire\Dashboard\Managers\ListManagers;
use App\Http\Livewire\Dashboard\RolesAndPermissions\Permissions;
use App\Http\Livewire\Dashboard\RolesAndPermissions\Roles;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('mail/reset', 'test.reset');

Route::get('dashboard', Home::class)->middleware(['auth'])->name('dashboard');

// super-admin
Route::group(['middleware' => ['auth', 'role:super-admin']], function () {
    Route::get('roles', Roles::class)->name('roles');
    Route::get('permissions', Permissions::class)->name('permissions');
    Route::get('company-create', CreateCompany::class)->name('companies.create');
    Route::get('companies', ListCompanies::class)->name('companies.list');
});

// company
Route::group(['middleware' => ['auth', 'role:company']], function () {
    Route::get('managers', ListManagers::class)->name('managers.list');
});

// company
Route::group(['middleware' => ['auth', 'role:manager']], function () {
    Route::get('employees', ListEmployees::class)->name('employees.list');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/test.php';
