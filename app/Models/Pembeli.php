<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;

    protected $table = 'pembelis';

    protected $primaryKey = 'pembeli_No_KTP';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'pembeli_No_KTP',
        'pembeli_nama',
        'pembeli_alamat',
        'pembeli_telpon',
        'pembeli_HP',
    ];

    public function beliCash()
    {
        return $this->hasMany(BeliCash::class, 'pembeli_No_KTP', 'pembeli_No_KTP');
    }

    public function beliKredit()
    {
        return $this->hasMany(BeliKredit::class, 'pembeli_No_KTP', 'pembeli_No_KTP');
    }
}
