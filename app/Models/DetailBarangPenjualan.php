<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    DetailBarangPembelian,
    Penjualan,
    Barang
};

class DetailBarangPenjualan extends Model
{
    use HasFactory;
    protected $table = "detail_barang_penjualan";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function detail_barang_pembelian()
    {
        return $this->belongsTo(DetailBarangPembelian::class);
    }

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
