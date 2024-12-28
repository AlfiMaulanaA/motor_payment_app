<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeliKredit extends Model
{
    use HasFactory;

    protected $table = 'beli_kredit';

    protected $primaryKey = 'kridit_kode';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'kridit_kode',
        'pembeli_No_KTP',
        'paket_kode',
        'motor_kode',
        'kridit_tanggal',
        'fotokopi_KTP',
        'fotokopi_KK',
        'fotokopi_slip_gaji',
    ];

    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class, 'pembeli_No_KTP', 'pembeli_No_KTP');
    }

    public function paket()
    {
        return $this->belongsTo(KreditPaket::class, 'paket_kode', 'paket_kode');
    }

    public function motor()
    {
        return $this->belongsTo(Motor::class, 'motor_kode', 'motor_kode');
    }
}
