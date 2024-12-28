<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PembeliSeeder extends Seeder
{
    public function run()
    {
        DB::table('pembelis')->insert([
            [
                'pembeli_No_KTP' => '3201234567891234',
                'pembeli_nama' => 'Budi Santoso',
                'pembeli_alamat' => 'Jakarta',
                'pembeli_telpon' => 62212345678,
                'pembeli_HP' => 628123456789,
            ],
            [
                'pembeli_No_KTP' => '3209876543219876',
                'pembeli_nama' => 'Siti Aminah',
                'pembeli_alamat' => 'Bandung',
                'pembeli_telpon' => 62298765432,
                'pembeli_HP' => 628987654321,
            ],
        ]);
    }
}
