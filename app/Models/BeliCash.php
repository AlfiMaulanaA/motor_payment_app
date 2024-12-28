<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeliCash extends Model
{
    use HasFactory;

    protected $table = 'beli_cash';

    protected $primaryKey = 'cash_kode';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'cash_kode',
        'pembeli_No_KTP',
        'motor_kode',
        'cash_tanggal',
        'cash_bayar',
    ];

    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class, 'pembeli_No_KTP', 'pembeli_No_KTP');
    }

    public function motor()
    {
        return $this->belongsTo(Motor::class, 'motor_kode', 'motor_kode');
    }
}
