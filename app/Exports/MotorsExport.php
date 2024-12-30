<?php

namespace App\Exports;

use App\Models\Motor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MotorsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Motor::select('motor_kode', 'motor_merk', 'motor_type', 'motor_harga', 'motor_warna_pilihan')->get();
    }

    public function headings(): array
    {
        return [
            'Kode Motor',
            'Merk Motor',
            'Tipe Motor',
            'Harga Motor',
            'Warna Pilihan',
        ];
    }
}
