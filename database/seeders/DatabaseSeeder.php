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
            UserSeeder::class,
            MotorSeeder::class,
            PembeliSeeder::class,
            KreditPaketSeeder::class,
            BeliCashSeeder::class,
            BeliKreditSeeder::class,
            BayarCicilanSeeder::class,
        ]);
    }
}
