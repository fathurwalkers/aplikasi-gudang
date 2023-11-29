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
        $all_pegawai = Pegawai::all();
        dd($all_pegawai);
    }
}
