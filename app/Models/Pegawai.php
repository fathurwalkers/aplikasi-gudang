<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailBarangPerbaikan;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = "pegawai";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function detail_barang_perbaikan()
    {
        return $this->hasMany(DetailBarangPerbaikan::class);
    }
}
