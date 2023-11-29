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
    public function data_vendor()
    {
        $vendor = vendor::all();
        return view('dashboard.vendor.data-vendor', [
            'vendor' => $vendor
        ]);
    }

    public function tambah_vendor(Request $request)
    {
        $vendor_nama = $request->vendor_nama;
        $vendor_email = $request->vendor_email;
        $vendor_alamat = $request->vendor_alamat;
        $vendor_nohp = $request->vendor_nohp;

        $vendor = new Vendor;
        $save_vendor = $vendor->create([
            'vendor_nama' => $vendor_nama,
            'vendor_alamat' => $vendor_alamat,
            'vendor_nohp' => $vendor_nohp,
            'vendor_email' => $vendor_email,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $save_vendor->save();
        if ($save_vendor == true) {
            return redirect()->route('data-vendor')->with('status', 'Data Vendor telah berhasil ditambahkan!');
        } else {
            return redirect()->route('data-vendor')->with('status', 'Terjadi kesalahan. Data tidak dapat ditambahkan.');
        }

    }

    public function hapus_vendor(Request $request, $id)
    {
        $vendor = Vendor::find($id);
        $vendor_hapus = $vendor->forceDelete();
        if ($vendor_hapus == true) {
            return redirect()->route('data-vendor')->with('status', 'Data telah berhasil dihapus!');
        } else {
            return redirect()->route('data-vendor')->with('status', 'Terjadi kesalahan. Data tidak dapat dihapus.');
        }
    }
}
