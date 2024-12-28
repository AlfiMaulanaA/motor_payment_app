<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeliKreditSeeder extends Seeder
{
    public function run()
    {
        DB::table('beli_kredit')->insert([
            [
                'kridit_kode' => 'K001',
                'pembeli_No_KTP' => '3201234567891234',
                'paket_kode' => 'P001',
                'motor_kode' => 'M001',
                'kridit_tanggal' => '2024-12-05',
                'fotokopi_KTP' => true,
                'fotokopi_KK' => true,
                'fotokopi_slip_gaji' => true,
            ],
        ]);
    }
}
