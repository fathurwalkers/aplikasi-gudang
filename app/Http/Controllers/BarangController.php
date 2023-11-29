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

class BarangController extends Controller
{
    public function data_barang()
    {
        $barang = Barang::all();
        $jenis_barang = Jenisbarang::all();
        $kategori_barang = Kategoribarang::all();
        return view('dashboard.barang.data-barang', [
            'barang' => $barang,
            'jenis_barang' => $jenis_barang,
            'kategori_barang' => $kategori_barang
        ]);
    }

    public function tambah_barang(Request $request)
    {
        $barang_nama = $request->barang_nama;
        $barang_satuan = $request->barang_satuan;
        $barang_sisa_stok_gudang = $request->barang_sisa_stok_gudang;
        $jenis_barang = $request->jenis_barang;
        $kategori_barang = $request->kategori_barang;

        $id_jenis = intval($jenis_barang);
        $id_kategori = intval($kategori_barang);

        $jenis_id = Jenisbarang::find($id_jenis);
        $kategori_id = Kategoribarang::find($id_kategori);

        $barang = new Barang;
        $save_barang = $barang->create([
            'barang_nama' => $barang_nama,
            'barang_satuan' => $barang_satuan,
            'barang_sisa_stok_gudang' => $barang_sisa_stok_gudang,
            'jenisbarang_id' => $jenis_id->id,
            'kategoribarang_id' => $kategori_id->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $save_barang->save();
        if ($save_barang == true) {
            return redirect()->route('data-barang')->with('status', 'Data barang telah berhasil ditambahkan!');
        } else {
            return redirect()->route('data-barang')->with('status', 'Terjadi kesalahan. Data tidak dapat ditambahkan.');
        }

    }

    public function hapus_barang(Request $request, $id)
    {
        $barang = Barang::find($id);
        $barang_hapus = $barang->forceDelete();
        if ($barang_hapus == true) {
            return redirect()->route('data-barang')->with('status', 'Data telah berhasil dihapus!');
        } else {
            return redirect()->route('data-barang')->with('status', 'Terjadi kesalahan. Data tidak dapat dihapus.');
        }
    }
}
