<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use HasFactory;

    protected $table = 'motors';

    protected $primaryKey = 'motor_kode';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'motor_kode',
        'motor_merk',
        'motor_type',
        'motor_warna_pilihan',
        'motor_harga',
        'motor_gambar',
    ];

    public function beliCash()
    {
        return $this->hasMany(BeliCash::class, 'motor_kode', 'motor_kode');
    }

    public function beliKredit()
    {
        return $this->hasMany(BeliKredit::class, 'motor_kode', 'motor_kode');
    }
}
