<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat peran admin jika belum ada
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Buat akun admin
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'], // Ganti dengan email admin yang diinginkan
            [
                'name' => 'Admin',
                'password' => Hash::make('admin'), // Ganti dengan password yang diinginkan
                'whatsapp_number' => '1234567890' // Opsional
            ]
        )->assignRole($adminRole);
    }
}
