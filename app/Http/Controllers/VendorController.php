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

class VendorController extends Controller
{
    public function data_customer()
    {
        $customer = customer::all();
        return view('dashboard.customer.data-customer', [
            'customer' => $customer
        ]);
    }

    public function tambah_customer(Request $request)
    {
        $customer_nama = $request->customer_nama;
        $customer_email = $request->customer_email;
        $customer_alamat = $request->customer_alamat;
        $customer_nohp = $request->customer_nohp;

        $customer = new customer;
        $save_customer = $customer->create([
            'customer_nama' => $customer_nama,
            'customer_alamat' => $customer_alamat,
            'customer_nohp' => $customer_nohp,
            'customer_email' => $customer_email,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $save_customer->save();
        if ($save_customer == true) {
            return redirect()->route('data-customer')->with('status', 'customer telah berhasil ditambahkan!');
        } else {
            return redirect()->route('data-customer')->with('status', 'Terjadi kesalahan. Data tidak dapat ditambahkan.');
        }

    }

    public function hapus_customer(Request $request, $id)
    {
        $customer = Customer::find($id);
        $customer_hapus = $customer->forceDelete();
        if ($customer_hapus == true) {
            return redirect()->route('data-customer')->with('status', 'Customer telah berhasil dihapus!');
        } else {
            return redirect()->route('data-customer')->with('status', 'Terjadi kesalahan. Data tidak dapat dihapus.');
        }
    }
}
