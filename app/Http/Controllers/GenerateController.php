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
        $all_vendor = Vendor::all();
        dd($all_vendor);
    }
}
