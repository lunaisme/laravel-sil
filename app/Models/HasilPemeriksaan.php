<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilPemeriksaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'parameter',
        'hasil',
        'satuan',
        'nilai_rujukan',
        'metode',
        'status',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}
