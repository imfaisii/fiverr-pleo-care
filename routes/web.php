<?php

use App\Http\Controllers\ShiftController;
use App\Http\Livewire\Dashboard\Clients\CreateClient;
use App\Http\Livewire\Dashboard\Clients\ListClients;
use App\Http\Livewire\Dashboard\Companies\CreateCompany;
use App\Http\Livewire\Dashboard\Companies\ListCompanies;
use App\Http\Livewire\Dashboard\Employees\CreateEmployee;
use App\Http\Livewire\Dashboard\Employees\ListEmployees;
use App\Http\Livewire\Dashboard\Home;
use App\Http\Livewire\Dashboard\JobRoles\CreateJobRole;
use App\Http\Livewire\Dashboard\JobRoles\ListJobRoles;
use App\Http\Livewire\Dashboard\Managers\ListManagers;
use App\Http\Livewire\Dashboard\Profile\Index as ProfileIndex;
use App\Http\Livewire\Dashboard\RolesAndPermissions\Permissions;
use App\Http\Livewire\Dashboard\RolesAndPermissions\Roles;
use App\Http\Livewire\Dashboard\Shifts\CreateShift;
use App\Http\Livewire\Dashboard\Shifts\Employees\ViewShifts;
use App\Http\Livewire\Dashboard\Shifts\ListShifts;
use App\Http\Livewire\Dashboard\Shifts\Proposals;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'web'], function () {
    // Welcome
    Route::view('/', 'welcome')->name('welcome');

    // LINK to START A PUBLIC SHIFT
    Route::view('/public/start-shift', 'test')->name('start-shift');

    Route::get('/shifts/{uuid}', [ShiftController::class, 'index'])->name('shift.view');
    Route::post('/shifts', [ShiftController::class, 'check'])->name('shift.start');
});

/* ========= Authenticated Routes ========= */

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', Home::class)->name('dashboard');
    Route::get('/profile', ProfileIndex::class)->name('profile.edit');
});


// super-admin
Route::group(['middleware' => ['auth', 'role:super-admin']], function () {
    Route::get('/roles', Roles::class)->name('roles');
    Route::get('/permissions', Permissions::class)->name('permissions');
    Route::get('/company/create', CreateCompany::class)->name('companies.create');
    Route::get('/companies', ListCompanies::class)->name('companies.list');
});

// company
Route::group(['middleware' => ['auth', 'role:company']], function () {
    Route::get('/managers', ListManagers::class)->name('managers.list');
    Route::get('/job-roles/create/{jobRole?}', CreateJobRole::class)->name('job-roles.create');
    Route::get('/job-roles', ListJobRoles::class)->name('job-roles.list');
});

// manager
Route::group(['middleware' => ['auth', 'role:manager']], function () {
    Route::get('/employee/create', CreateEmployee::class)->name('employees.create');
    Route::get('/employees', ListEmployees::class)->name('employees.list');
    Route::get('/client/create', CreateClient::class)->name('clients.create');
    Route::get('/clients', ListClients::class)->name('clients.list');
    Route::get('/shift/create', CreateShift::class)->name('shifts.create');
    Route::get('/shifts', ListShifts::class)->name('shifts.list');
    Route::get('/shift/proposals', Proposals::class)->name('shifts.proposals');
});

// company
Route::group(['middleware' => ['auth', 'role:employee']], function () {
    Route::get('/view/shifts', ViewShifts::class)->name('employees.shifts.view');
});

require __DIR__ . '/auth.php';
