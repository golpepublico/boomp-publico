<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'loja']);

        $role = Role::create([
            'name' => 'admin'
        ]);

        $permission = Permission::create([
            'name' => 'create user'
        ]);

        $role->givePermissionTo($permission);
    }
}
