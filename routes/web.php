<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HealthcareController;
use App\Http\Controllers\KonsultasiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Healthcare Ecosystem
|--------------------------------------------------------------------------
*/

// 🚪 1. Rute Otomatis (Saat pertama kali web dibuka langsung diarahkan ke /home)
Route::get('/', function () {
    return redirect('/home');
});

// 🏠 2. Navigasi Utama Aplikasi (Diarahkan ke Controller)
Route::get('/home', [HealthcareController::class, 'home'])->name('home');
Route::get('/beranda', [HealthcareController::class, 'beranda'])->name('beranda');
Route::get('/layanan', [HealthcareController::class, 'layanan'])->name('layanan');
Route::get('/artikel', [HealthcareController::class, 'artikel'])->name('artikel');
Route::get('/bantuan', [HealthcareController::class, 'bantuan'])->name('bantuan');
Route::get('/riwayat', [HealthcareController::class, 'riwayat'])->name('riwayat');
Route::get('/profil', [HealthcareController::class, 'profil'])->name('profil');

// // Register
// Pastikan hanya ini rute pendaftarannya:
Route::get('/register', [HealthcareController::class, 'register'])->name('register');
Route::post('/register/process', [HealthcareController::class, 'registerProcess'])->name('daftar.proses');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.perform');

// Logout
// Pastikan ini POST, bukan GET
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');  

// 🛒 4. Fitur: Beli Obat (Katalog & Manajemen Data)
Route::get('/beli-obat', [HealthcareController::class, 'beliobat'])->name('beliobat');
Route::post('/beli-obat/tambah', [HealthcareController::class, 'tambahObat']);
Route::get('/beli-obat/cari/{id}', [HealthcareController::class, 'cari']);
Route::get('/beli-obat/edit/{id}', [HealthcareController::class, 'ambilObat']);
Route::post('/beli-obat/update', [HealthcareController::class, 'updateObat']);
Route::get('/beli-obat/hapus/{id}', [HealthcareController::class, 'hapusObat']);

// 💬 5. Fitur: Konsultasi Dokter
Route::get('/konsultasi', [HealthcareController::class, 'konsultasi'])->name('konsultasi');

// 🏥 6. Fitur: Janji Medis
Route::get('/janji-medis', [HealthcareController::class, 'janjiMedis'])->name('janjimedis');
Route::post('/janji-medis/simpan', [HealthcareController::class, 'simpanJanjiMedis'])->name('janji.simpan');
Route::post('/janji-medis/update-status', [HealthcareController::class, 'adminUpdateStatusJanji'])->name('admin.updateStatusJanji');

// 🧪 7. Fitur: Tes Lab
Route::get('/tes-lab', [HealthcareController::class, 'tesLab'])->name('teslab');

// 🛡️ User Route
Route::get('/asuransi', [HealthcareController::class, 'asuransi'])->name('asuransi');
Route::post('/simpan-asuransi', [HealthcareController::class, 'simpanAsuransi'])->name('simpan.asuransi');

// 🛡️ Admin Route (Gunakan Middleware untuk keamanan)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/asuransi', [HealthcareController::class, 'index'])->name('admin.asuransi.index');
    Route::post('/admin/asuransi/update/{id}', [HealthcareController::class, 'updateStatus'])->name('admin.asuransi.update');
    // Contoh route yang benar
Route::post('/update-status/{id}', [HealthcareController::class, 'updateStatus'])->name('update.status');
    Route::post('/asuransi/simpan', [HealthcareController::class, 'simpanAsuransi'])->name('simpan.asuransi');
});

// 👨‍💻 9. Fitur: Dashboard Admin Terpadu
Route::get('/admin-dashboard', [HealthcareController::class, 'adminDashboard'])->name('admin.dashboard');
Route::post('/admin/update-status', [HealthcareController::class, 'adminUpdateStatus'])->name('admin.updateStatus');

// Route User mengirim data belanjaan
Route::post('/beli-obat/simpan-pesanan', [HealthcareController::class, 'simpanPesananObat'])->name('obat.simpanPesanan');

// Route Dashboard Admin khusus obat
Route::get('/admin-obat', [HealthcareController::class, 'adminObatDashboard'])->name('admin.obat');
Route::post('/admin-obat/update-status', [HealthcareController::class, 'adminUpdateStatusObat'])->name('admin.updateStatusObat');

Route::post('/tes-lab/simpan-booking', [HealthcareController::class, 'simpanBookingLab'])->name('lab.simpanBooking');
Route::post('/tes-lab/update-status', [HealthcareController::class, 'adminUpdateStatusLab'])->name('admin.updateStatusLab');

// Route untuk menampilkan halaman profil
Route::get('/profil', function () {
    return view('profil');
})->middleware('auth');

// Route untuk memproses upload foto (dari Controller yang sudah kita buat)
Route::post('/update-profil', [App\Http\Controllers\HealthcareController::class, 'updateProfil'])->middleware('auth');
// Route biasa (tanpa middleware 'admin')
Route::post('/update-status/{id}', [HealthcareController::class, 'updateStatus'])->name('update.status');

// 🛡️ Rute Asuransi (Dipisah agar tidak bentrok)
Route::group(['middleware' => 'auth'], function () {
    Route::get('/asuransi', [HealthcareController::class, 'asuransi'])->name('asuransi');
    Route::post('/simpan-asuransi', [HealthcareController::class, 'simpanAsuransi'])->name('simpan.asuransi');
    
    // Rute khusus admin untuk update status asuransi (tanpa middleware 'admin')
    Route::post('/asuransi/update-status/{id}', [HealthcareController::class, 'updateStatus'])->name('update.status');
});


// KONSULTASI DOKTER//

Route::post('/konsultasi/pembayaran', [KonsultasiController::class, 'prosesPembayaran'])->name('konsultasi.pembayaran');
Route::post('/obat/store', [App\Http\Controllers\HealthcareController::class, 'storeObat'])->name('obat.store');

Route::middleware(['auth'])->group(function () {
    // Rute untuk menampilkan profil
    Route::get('/profil', [HealthcareController::class, 'showProfil'])->name('profil.show');

    // Rute untuk update data diri
    Route::post('/update-profil', [HealthcareController::class, 'updateProfil'])->name('profil.update');
    
});

Route::post('/update-foto', [HealthcareController::class, 'updateFoto'])->name('profil.updateFoto');
Route::get('/konsultasi', [HealthcareController::class, 'konsultasi'])->name('konsultasi');
Route::get('/cari/{id}', [HealthcareController::class, 'cari']);