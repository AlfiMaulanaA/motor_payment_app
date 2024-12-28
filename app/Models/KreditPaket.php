<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KreditPaket extends Model
{
    use HasFactory;

    protected $table = 'kredit_paket';

    protected $primaryKey = 'paket_kode';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'paket_kode',
        'paket_harga_cash',
        'paket_uang_muka',
        'paket_jumlah_cicilan',
        'paket_bunga',
        'paket_nilai_cicilan',
    ];

    public function beliKredit()
    {
        return $this->hasMany(BeliKredit::class, 'paket_kode', 'paket_kode');
    }
}
