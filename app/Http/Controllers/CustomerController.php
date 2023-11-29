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

class CustomerController extends Controller
{
    public function data_customer()
    {
        $customer = customer::all();
        return view('dashboard.customer.data-customer', [
            'customer' => $customer
        ]);
    }

    public function tambah_pegawai(Request $request)
    {
        $pegawai_nama = $request->pegawai_nama;
        $pegawai_jabatan = $request->pegawai_jabatan;
        $pegawai_alamat = $request->pegawai_alamat;
        $pegawai_nohp = $request->pegawai_nohp;

        $pegawai = new Pegawai;
        $save_pegawai = $pegawai->create([
            'pegawai_nama' => $pegawai_nama,
            'pegawai_jabatan' => $pegawai_jabatan,
            'pegawai_alamat' => $pegawai_alamat,
            'pegawai_nohp' => $pegawai_nohp,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $save_pegawai->save();
        if ($save_pegawai == true) {
            return redirect()->route('data-pegawai')->with('status', 'Pegawai telah berhasil ditambahkan!');
        } else {
            return redirect()->route('data-pegawai')->with('status', 'Terjadi kesalahan. Data tidak dapat ditambahkan.');
        }

    }

    public function hapus_pegawai(Request $request, $id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai_hapus = $pegawai->forceDelete();
        if ($pegawai_hapus == true) {
            return redirect()->route('data-pegawai')->with('status', 'Pegawai telah berhasil dihapus!');
        } else {
            return redirect()->route('data-pegawai')->with('status', 'Terjadi kesalahan. Data tidak dapat dihapus.');
        }
    }
}
