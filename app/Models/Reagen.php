<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reagen extends Model
{
    use HasFactory;

    protected $fillable = ['kode', 'nama', 'stok_awal'];

    public function transaksiMasuk()
    {
        return $this->hasMany(Transaksi::class)->where('tipe', 'masuk');
    }

    public function transaksiKeluar()
    {
        return $this->hasMany(Transaksi::class)->where('tipe', 'keluar');
    }
}
