<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BackController,
    BarangController,
    CustomerController,
    GenerateController,
    PegawaiController,
    PembelianController,
    PenjualanController,
    VendorController
};

// Route Default ketika aplikasi Pertama Kali di Akses akan langsung diarahkan ke Halaman /home
Route::get('/', function() {
    return redirect()->route('dashboard');
});

// Route untuk Halaman Login
Route::get('/login', [BackController::class, 'login'])->name('login');
// Route untuk Proses permintaan Login ke Dashboard
Route::post('/login/proses-login', [BackController::class, 'postlogin'])->name('post-login');

// Route untuk Halaman Register
Route::get('/register', [BackController::class, 'register'])->name('register');
// Route untuk Proses pembuatan Akun Baru (Register)
Route::post('/login/proses-register', [BackController::class, 'postregister'])->name('post-register');

// Route untuk Keluar dari sesi Halaman Dashboard dan Kembali ke Halaman Login
Route::post('/logout', [BackController::class, 'logout'])->name('logout');

// Route untuk Halaman Dashboard Aplikasi
Route::group(['prefix' => '/dashboard', 'middleware' => 'ceklogin'], function () {

    // Default Route untuk Dashboard
    Route::get('/', [BackController::class, 'index'])->name('dashboard');

    // PEMBELIAN ROUTE
    Route::group(['prefix' => '/pembelian'], function () {
        Route::get('/', fn() => redirect()->route('daftar-berita'));
        Route::get('/data-pembelian', [PembelianController::class, 'data_pembelian'])->name('data-pembelian');
    });

    // PENJUALAN ROUTE
    Route::group(['prefix' => '/penjualan'], function () {
        Route::get('/', fn() => redirect()->route('daftar-berita'));
        Route::get('/data-penjualan', [PenjualanController::class, 'data_penjualan'])->name('data-penjualan');
    });

    // BERITA ROUTE
    Route::group(['prefix' => '/barang'], function () {
        Route::get('/', fn () => redirect()->route('daftar-berita'));
        Route::get('/data-barang', [BarangController::class, 'data_barang'])->name('data-barang');
        Route::get('/kategori-barang', [BarangController::class, 'kategori_barang'])->name('kategori-barang');
        Route::get('/jenis-barang', [BarangController::class, 'jenis_barang'])->name('jenis-barang');
        Route::post('/tambah-barang', [BarangController::class, 'tambah_barang'])->name('tambah-barang');
        Route::post('/hapus-barang/{id}', [BarangController::class, 'hapus_barang'])->name('hapus-barang');
        Route::post('/update-barang/{id}', [BarangController::class, 'update_barang'])->name('update-barang');
    });

    // PEGAWAI ROUTE
    Route::group(['prefix' => '/pegawai'], function () {
        Route::get('/', fn () => redirect()->route('daftar-berita'));
        Route::get('/data-pegawai', [PegawaiController::class, 'data_pegawai'])->name('data-pegawai');
        Route::post('/tambah-pegawai', [PegawaiController::class, 'tambah_pegawai'])->name('tambah-pegawai');
        Route::post('/hapus-pegawai/{id}', [PegawaiController::class, 'hapus_pegawai'])->name('hapus-pegawai');
        Route::post('/update-pegawai/{id}', [PegawaiController::class, 'update_pegawai'])->name('update-pegawai');
    });

    // CUSTOMER ROUTE
    Route::group(['prefix' => '/customer'], function () {
        Route::get('/', fn () => redirect()->route('daftar-berita'));
        Route::get('/data-customer', [CustomerController::class, 'data_customer'])->name('data-customer');
        Route::post('/tambah-customer', [CustomerController::class, 'tambah_customer'])->name('tambah-customer');
        Route::post('/hapus-customer/{id}', [CustomerController::class, 'hapus_customer'])->name('hapus-customer');
        Route::post('/update-customer/{id}', [CustomerController::class, 'update_customer'])->name('update-customer');
    });

    // VENDOR ROUTE
    Route::group(['prefix' => '/vendor'], function () {
        Route::get('/', fn () => redirect()->route('daftar-berita'));
        Route::get('/data-vendor', [VendorController::class, 'data_vendor'])->name('data-vendor');
        Route::post('/tambah-vendor', [VendorController::class, 'tambah_vendor'])->name('tambah-vendor');
        Route::post('/hapus-vendor/{id}', [VendorController::class, 'hapus_vendor'])->name('hapus-vendor');
        Route::post('/update-vendor/{id}', [VendorController::class, 'update_vendor'])->name('update-vendor');
    });

});

// GENERATE ROUTE
Route::group(['prefix' => '/generate'], function () {
    Route::get('/pegawai', [GenerateController::class, 'generate_pegawai'])->name('generate-pegawai');
    Route::get('/customer', [GenerateController::class, 'generate_customer'])->name('generate-customer');
    Route::get('/vendor', [GenerateController::class, 'generate_vendor'])->name('generate-vendor');
    Route::get('/barang', [GenerateController::class, 'generate_barang'])->name('generate-barang');

    // GENERATE SEMUA DATA
    Route::get('/semua', [GenerateController::class, 'generate_semua'])->name('generate-semua');
});
