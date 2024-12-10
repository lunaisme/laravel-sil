<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['reagen_id', 'tipe', 'jumlah', 'keterangan'];

    public function reagen()
    {
        return $this->belongsTo(Reagen::class);
    }
}
