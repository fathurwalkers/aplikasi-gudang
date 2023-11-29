<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    Kategoribarang,
    Jenisbarang,
    DetailBarangPembelian,
    DetailBarangPenjualan
};

class Barang extends Model
{
    use HasFactory;
    protected $table = "barang";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function kategoribarang()
    {
        return $this->belongsTo(Kategoribarang::class);
    }

    public function jenisbarang()
    {
        return $this->belongsTo(Jenisbarang::class);
    }

    public function detail_barang_pembelian()
    {
        return $this->belongsTo(DetailBarangPembelian::class);
    }
    public function detail_barang_penjualan()
    {
        return $this->belongsTo(DetailBarangPenjualan::class);
    }
}
