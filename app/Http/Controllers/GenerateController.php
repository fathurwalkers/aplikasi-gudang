<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Faker\Factory as Faker;
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

class GenerateController extends Controller
{
    public function generate_pegawai()
    {
        $faker = Faker::create('id_ID');

        for ($i=0; $i < 5; $i++) {
            $pegawai = new Pegawai;
            $raw_gender = ["L", "P"];
            $raw_jabatan = ["Staff Umum", "Staff IT", "Staff Gudang", "Staff Administrasi", "Finance", "Manajer", "Karyawan", "Accounting", "Opetator"];
            $gender = Arr::random($raw_gender);
            $pegawai_jabatan = Arr::random($raw_jabatan);
            $pegawai_alamat = $faker->address();
            $pegawai_nomor_telepon = $faker->phoneNumber();
            switch ($gender) {
                case "L":
                    $pegawai_nama = $faker->firstNameMale() . " " . $faker->lastNameMale();
                    break;
                case "P":
                    $pegawai_nama = $faker->firstNameFemale() . " " . $faker->lastNameFemale();
                    break;
            }

            $save_pegawai = $pegawai->create([
                'pegawai_nama' => $pegawai_nama,
                'pegawai_jabatan' => $pegawai_jabatan,
                'pegawai_alamat' => $pegawai_alamat,
                'pegawai_nohp' => $pegawai_nomor_telepon,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $save_pegawai->save();
        }
    }

    public function generate_customer()
    {
        $faker = Faker::create('id_ID');

        for ($i=0; $i < 5; $i++) {
            $customer = new Customer;
            $raw_gender = ["L", "P"];
            $gender = Arr::random($raw_gender);
            $customer_email = $faker->email();
            $customer_alamat = $faker->address();
            $customer_nomor_telepon = $faker->phoneNumber();
            switch ($gender) {
                case "L":
                    $customer_nama = $faker->firstNameMale() . " " . $faker->lastNameMale();
                    break;
                case "P":
                    $customer_nama = $faker->firstNameFemale() . " " . $faker->lastNameFemale();
                    break;
            }

            $save_customer = $customer->create([
                'customer_nama' => $customer_nama,
                'customer_alamat' => $customer_alamat,
                'customer_nohp' => $customer_nomor_telepon,
                'customer_email' => $customer_email,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $save_customer->save();
        }
    }

    public function generate_vendor()
    {
        $faker = Faker::create('id_ID');

        for ($i=0; $i < 5; $i++) {
            $vendor = new Vendor;
            $vendor_nama = $faker->company();
            $vendor_alamat = $faker->address();
            $vendor_nomor_telepon = $faker->phoneNumber();
            $vendor_email = $faker->email();

            $save_vendor = $vendor->create([
                'vendor_nama' => $vendor_nama,
                'vendor_alamat' => $vendor_alamat,
                'vendor_nohp' => $vendor_nomor_telepon,
                'vendor_email' => $vendor_email,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $save_vendor->save();
        }
    }

    public function generate_barang()
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 10; $i++) {
            $barang = new Barang;
            $array_jenis_barang = Jenisbarang::all()->toArray();
            $array_kategori_barang = Kategoribarang::all()->toArray();
            $array_nama_barang = ["Mesin", "Sparepart", "Aksesoris", "Mesin Tekstil"];
            $array_seri_barang = ["Normal", "Super", "Ultra", "Pro", "Max"];
            $array_satuan = [1, 2];

            $barang_nama = Arr::random($array_nama_barang) . " " . Str::random(10) . " " . Arr::random($array_seri_barang);
            $barang_satuan = $faker->randomNumber(Arr::random($array_satuan));
            $jenis_barang = Arr::random($array_jenis_barang);
            $kategori_barang = Arr::random($array_kategori_barang);
            $barang_sisa_stok_gudang = $faker->randomNumber(Arr::random($array_satuan));

            $save_barang = $barang->create([
                'barang_nama' => $barang_nama,
                'barang_satuan' => $barang_satuan,
                'barang_sisa_stok_gudang' => $barang_sisa_stok_gudang,
                'kategoribarang_id' => $kategori_barang["id"],
                'jenisbarang_id' => $jenis_barang["id"],
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $save_barang->save();
        }
    }

    public function generate_semua()
    {
        $this->generate_pegawai();
        $this->generate_customer();
        $this->generate_vendor();
        $this->generate_barang();
    }
}
