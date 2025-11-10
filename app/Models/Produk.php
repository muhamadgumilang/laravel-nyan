<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    // database column for product name is `nama` (existing table).
    // The form uses `nama_produk`, controllers will map that to `nama`.
    protected $fillable = ['nama', 'stok', 'harga'];
    protected $visible  = ['nama', 'stok', 'harga'];

    public function transaksis()
    {
        return $this->belongsToMany(Transaksi::class, 'detail_transaksi', 'id_produk', 'id_transaksi')
            ->withPivot('jumlah', 'sub_total')
            ->withTimestamps();
    }
}
