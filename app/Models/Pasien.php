<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasiens';

    protected $fillable = [
        'kode',
        'jenis_kelamin',
        'tgl_daftar',
        'jenis_pemeriksaan',
        'jaminan',
        'dokter',
        'no_rm',
        'nama_pasien',
        'tanggal_pemeriksaan',
        'pembayaran',
        'status_pemeriksaan'
    ];
    public function hasilPemeriksaan()
    {
        return $this->hasMany(HasilPemeriksaan::class);
    }
}
