<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'shift-list',
            'shift-create',
            'shift-edit',
            'shift-delete'
        ];

        foreach ($permissions as $permission) Permission::firstOrCreate(['name' => $permission]);
    }
}
