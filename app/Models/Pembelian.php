<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vendor;

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
}
