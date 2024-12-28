<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BayarCicilanSeeder extends Seeder
{
    public function run()
    {
        DB::table('bayar_cicilan')->insert([
            [
                'cicilan_kode' => 'B001',
                'kridit_kode' => 'K001',
                'cicilan_tanggal' => '2024-12-10',
                'cicilan_jumlah' => 1500000,
                'cicilan_ke' => 1,
                'cicilan_sisa_ke' => 23,
                'cicilan_sisa_harga' => 34500000,
            ],
        ]);
    }
}
