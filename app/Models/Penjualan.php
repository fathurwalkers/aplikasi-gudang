<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Penjualan extends Model
{
    use HasFactory;
    protected $table = "penjualan";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
