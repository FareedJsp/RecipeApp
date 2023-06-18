<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'edit-ingredient-types']);
        
        $superAdmin = Role::create(['name' => 'SuperAdmin']);
        $adminRole = Role::create(['name' => 'Admin']);
        $marketingRole = Role::create(['name' => 'Marketing']);
        $chefRole = Role::create(['name' => 'Chef']);
        $userRole = Role::create(['name' => 'User']);

        $superAdmin->givePermissionTo([
            'edit-ingredient-type'
        ]);

        $adminRole->givePermissionTo([
            'edit-ingredient-type'
        ]);
    }
}
