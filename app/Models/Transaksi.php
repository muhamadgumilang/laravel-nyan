<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ['kode_unik', 'tanggal_transaksi', 'pelanggan_id','total_harga'];

    // membuat relasi dari wali ke mahasiswa
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }
}
