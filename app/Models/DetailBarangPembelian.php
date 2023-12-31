<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    Pembelian,
    DetailBarangPenjualan,
    DetailBarangPerbaikan,
    Barang,
};

class DetailBarangPembelian extends Model
{
    use HasFactory;
    protected $table = "detail_barang_pembelian";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function detail_barang_penjualan()
    {
        return $this->hasMany(DetailBarangPenjualan::class);
    }

    public function detail_barang_perbaikan()
    {
        return $this->hasMany(DetailBarangPerbaikan::class);
    }
}
