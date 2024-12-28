<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AssignDefaultRoleToUsersSeeder extends Seeder
{
    public function run()
    {
        $defaultRoleId = 2; // Role ID untuk "user", sesuaikan dengan database Anda
        User::whereNull('role_id')->update(['role_id' => $defaultRoleId]);
    }
}
