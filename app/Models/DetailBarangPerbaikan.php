<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    DetailBarangPembelian,
    Pegawai
};

class DetailBarangPerbaikan extends Model
{
    use HasFactory;
    protected $table = "detail_barang_perbaikan";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function detail_barang_pembelian()
    {
        return $this->belongsTo(DetailBarangPembelian::class);
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
