<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\{
    Str,
    Arr
};
use App\Models\{
    Login,
    Barang,
    Pembelian,
    Penjualan,
    Pegawai,
    Jenisbarang,
    Kategoribarang,
    Vendor,
    Customer,
    DetailBarangPembelian,
    DetailBarangPenjualan,
    DetailBarangPerbaikan,
};

class PenjualanController extends Controller
{
    //
}
