<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            MotorSeeder::class,
            PembeliSeeder::class,
            KreditPaketSeeder::class,
            BeliCashSeeder::class,
            BeliKreditSeeder::class,
            BayarCicilanSeeder::class,

        ]);
        $this->call(AdminUserSeeder::class);
    }
}
