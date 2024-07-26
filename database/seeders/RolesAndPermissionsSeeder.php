<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'broadcast messages', 'guard_name' => 'web']);
        Permission::create(['name' => 'manage customers', 'guard_name' => 'web']);
        Permission::create(['name' => 'manage umrah packages', 'guard_name' => 'web']);
        Permission::create(['name' => 'view reports', 'guard_name' => 'web']);
        Permission::create(['name' => 'manage users', 'guard_name' => 'web']);

        // create admin role and assign all permissions
        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $adminRole->givePermissionTo(Permission::all());

        // create manajer role and assign specific permissions
        $manajerRole = Role::create(['name' => 'manajer', 'guard_name' => 'web']);
        $manajerRole->givePermissionTo([
            'broadcast messages',
            'manage customers',
            'manage umrah packages',
            'view reports'
        ]);

        // Create admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123') // Ganti dengan password yang aman
        ]);

        $admin->assignRole('admin');
    }
}
