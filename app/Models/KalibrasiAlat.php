<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KalibrasiAlat extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari konvensi
    protected $table = 'kalibrasi_alats';

    // Tentukan atribut yang dapat diisi massal
    protected $fillable = [
        'kode_alat',
        'nama_alat',
        'tanggal_kalibrasi',
        'status',
        'tanggal_update',
        'catatan',

    ];

    // Anda bisa menambahkan metode untuk mengatur tanggal update secara otomatis
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->tanggal_update = now(); // Set tanggal_update saat membuat
        });

        static::updating(function ($model) {
            $model->tanggal_update = now(); // Update tanggal_update saat mengupdate
        });
    }
}
