<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;

class Jenisbarang extends Model
{
    use HasFactory;
    protected $table = "jenis_barang";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
}
