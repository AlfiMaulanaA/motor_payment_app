<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeliCashSeeder extends Seeder
{
    public function run()
    {
        DB::table('beli_cash')->insert([
            [
                'cash_kode' => 'C001',
                'pembeli_No_KTP' => '3201234567891234',
                'motor_kode' => 'M001',
                'cash_tanggal' => '2024-12-01',
                'cash_bayar' => 30000000,
            ],
            [
                'cash_kode' => 'C002',
                'pembeli_No_KTP' => '3209876543219876',
                'motor_kode' => 'M002',
                'cash_tanggal' => '2024-12-10',
                'cash_bayar' => 22000000,
            ],
        ]);
    }
}
