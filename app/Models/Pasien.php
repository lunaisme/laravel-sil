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
        'nama',
        'jenis_kelamin',
        'tgl_daftar',
        'jenis_pemeriksaan',
        'jaminan',
        'dokter'
    ];
}
