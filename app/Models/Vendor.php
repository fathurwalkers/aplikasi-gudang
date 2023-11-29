<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pembelian;

class Vendor extends Model
{
    use HasFactory;
    protected $table = "vendor";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class);
    }
}
