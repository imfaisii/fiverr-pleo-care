<?php

namespace Database\Seeders;

use App\Constants\Constant;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => Constant::SUPER_ADMIN, 'guard_name' => 'web'],
            ['name' => Constant::COMPANY, 'guard_name' => 'web'],
            ['name' => Constant::MANAGER, 'guard_name' => 'web'],
            ['name' => Constant::EMPLOYEE, 'guard_name' => 'web'],
        ];

        foreach ($roles as $key => $role) Role::firstOrCreate($role);
    }
}
