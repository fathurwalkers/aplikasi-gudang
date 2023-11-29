<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penjualan;

class Customer extends Model
{
    use HasFactory;
    protected $table = "customer";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }
}
