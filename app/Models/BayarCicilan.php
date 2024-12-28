<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BayarCicilan extends Model
{
    use HasFactory;

    protected $table = 'bayar_cicilan'; // Nama tabel di database

    protected $primaryKey = 'cicilan_kode'; // Primary key

    public $incrementing = false; // Jika primary key bukan integer auto-increment

    protected $keyType = 'string'; // Tipe data primary key

    protected $fillable = [
        'cicilan_kode',
        'kridit_kode',
        'cicilan_tanggal',
        'cicilan_jumlah',
        'cicilan_ke',
        'cicilan_sisa_ke',
        'cicilan_sisa_harga',
    ];

    public function beliKredit()
    {
        return $this->belongsTo(BeliKredit::class, 'kridit_kode', 'kridit_kode');
    }
}
