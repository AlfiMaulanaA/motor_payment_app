<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KreditPaketSeeder extends Seeder
{
    public function run()
    {
        DB::table('kredit_paket')->insert([
            [
                'paket_kode' => 'P001',
                'paket_harga_cash' => 30000000,
                'paket_uang_muka' => 5000000,
                'paket_jumlah_cicilan' => 24,
                'paket_bunga' => 2.5,
                'paket_nilai_cicilan' => 1500000,
            ],
            [
                'paket_kode' => 'P002',
                'paket_harga_cash' => 22000000,
                'paket_uang_muka' => 3000000,
                'paket_jumlah_cicilan' => 12,
                'paket_bunga' => 2.0,
                'paket_nilai_cicilan' => 1000000,
            ],
        ]);
    }
}
