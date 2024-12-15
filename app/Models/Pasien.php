<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasiens';

    protected $fillable = [
        'no_rm',
        'kode',
        'nama_pasien',
        'alamat',
        'status_pasien',
        'umur',
        'tgl_lahir',
        'jenis_kelamin',
        'jaminan',
        'no_jaminan',
        'dokter',
        'no_lab',
        'group_test',
        'jenis_pemeriksaan',
        'jenis_sample',
        'tgl_pemeriksaan',
        'pembayaran',
        'status_pemeriksaan',
    ];
    public function hasilPemeriksaan()
    {
        return $this->hasMany(HasilPemeriksaan::class);
    }
}
