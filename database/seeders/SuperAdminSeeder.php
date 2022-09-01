<?php

namespace Database\Seeders;

use App\Constants\Constant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::create([
            'name' => 'Super User',
            'email' => 'superadmin@pleotek.com',
            'password' => Hash::make('pleotek@321')
        ]);

        // adding avatar
        $superAdmin->addMedia(public_path('/images/avatar.jpg'))->preservingOriginal()->toMediaCollection('avatars');

        $role = Role::whereName(Constant::SUPER_ADMIN)->first();
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);

        $superAdmin->assignRole([$role->id]);
    }
}
