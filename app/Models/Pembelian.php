<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    Vendor,
    DetailBarangPembelian
};

class Pembelian extends Model
{
    use HasFactory;
    protected $table = "pembelian";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function detail_barang_pembelian()
    {
        return $this->hasMany(DetailBarangPembelian::class);
    }
}
