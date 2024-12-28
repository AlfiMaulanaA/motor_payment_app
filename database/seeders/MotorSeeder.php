<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotorSeeder extends Seeder
{
    public function run()
    {
        DB::table('motors')->insert([
            [
                'motor_kode' => 'M001',
                'motor_merk' => 'Yamaha',
                'motor_type' => 'NMAX',
                'motor_warna_pilihan' => 'Hitam',
                'motor_harga' => 30000000,
                'motor_gambar' => null,
            ],
            [
                'motor_kode' => 'M002',
                'motor_merk' => 'Honda',
                'motor_type' => 'Vario',
                'motor_warna_pilihan' => 'Putih',
                'motor_harga' => 22000000,
                'motor_gambar' => null,
            ],
        ]);
    }
}
