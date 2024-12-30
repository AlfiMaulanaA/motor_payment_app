<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan role admin sudah ada
        $adminRole = Role::firstOrCreate(['role_name' => 'admin']);

        // Buat user admin
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'], // Cek apakah user dengan email ini sudah ada
            [
                'name' => 'admin',
                'password' => Hash::make('admin123'), // Ganti dengan password yang sesuai
                'role_id' => $adminRole->id,
            ]
        );
    }
}
