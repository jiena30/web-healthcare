<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // 🚨 Ditambahkan untuk membaca session login user
use Illuminate\View\View;


class HealthcareController extends Controller
{
    // --- 🧭 Fitur: Navigasi & Halaman Dasar ---
    public function home() { 
        return view('home'); 
    }

    public function beranda() { 
        return view('beranda'); 
    }

    public function layanan() { 
        return view('layanan'); 
    }

    public function artikel() { 
        return view('artikel'); 
    }

    public function bantuan() { 
        return view('bantuan'); 
    }

public function riwayat()
{
    // Cukup ambil data dari tabel janjimedis saja, diurutkan dari yang terbaru
    $data_janji = DB::table('janjimedis')->orderBy('id_antrean', 'desc')->get();

    // Kirim data variabel $data_janji saja ke view riwayat
    return view('riwayat', compact('data_janji'));
}

    public function konsultasi()
{
    $konsultasi = DB::table('konsultasi')
        ->orderBy('id', 'desc')
        ->get();

    return view('konsultasi', compact('konsultasi'));
}

    public function profil() {
        // ✨ PERBAIKAN: Mengambil data user yang sedang login secara dinamis
        $user = DB::table('users')->where('id', Auth::id())->first();
        return view('profil', ['user' => $user]);
    }

    // --- 🏥 Fitur: Booking & Layanan Medis ---
   public function janjiMedis() { 
        $janji = DB::table('janjimedis')->get();
        return view('janjimedis', ['data' => $janji]);
    }

    // 2. FUNGSI BARU (Tambahkan di bawahnya untuk memproses simpan data dari form)
   public function simpanJanjiMedis(Request $request)
{
    $request->validate([
        'nama_dokter'   => 'required',
        'spesialisasi'  => 'required',
        'tanggal_janji' => 'required',
        'jam_janji'     => 'required',
        'keluhan'       => 'required',
    ]);

    $userId = session()->get('user_id');

    // Buat nomor antrean acak untuk kolom nomor_antrean di database kamu
    $angkaAcak = rand(1, 50);
    $nomorAntreanDibuat = "B-" . str_pad($angkaAcak, 3, '0', STR_PAD_LEFT);

    // 🔥 SINKRONISASI KOLOM: Disamakan persis dengan phpMyAdmin kamu!
    DB::table('janjimedis')->insert([
        'user_id'       => $userId ?? 1,
        'nama_faskes'   => $request->nama_dokter,   // masuk ke kolom nama_faskes
        'poli'          => $request->spesialisasi,  // masuk ke kolom poli
        'tanggal'       => $request->tanggal_janji, // masuk ke kolom tanggal
        'nomor_antrean' => $nomorAntreanDibuat,     // masuk ke kolom nomor_antrean
        'status'        => 'Diproses',
    ]);

    // Mengirimkan flash data ke blade agar pop-up tiket sukses menyala otomatis
    return redirect()->back()->with([
        'success'      => true,
        'rs_nama'      => $request->nama_dokter,
        'tgl_nama'     => $request->tanggal_janji,
        'nomor_tiket'  => $nomorAntreanDibuat
    ]);
}

public function adminUpdateStatusJanji(Request $request)
{
    DB::table('janjimedis')
        ->where('id_antrean', $request->id_data)
        ->update(['status' => $request->status_baru]);

    return redirect()->back()->with('success_update', 'Status kedatangan antrean pasien berhasil diperbarui!');
}

   public function teslab() 
    {
        // Mengambil semua data booking lab dari database untuk dibaca seksi Admin
        $data_lab = DB::table('teslab')->orderBy('id_lab', 'desc')->get();

        // Mengembalikan ke file view teslab.blade.php kamu sambil membawa datanya
        return view('teslab', compact('data_lab'));
    }

    // 🎯 TAMBAHKAN JUGA FUNGSI UPDATE STATUS UNTUK ADMIN NYA
    public function adminUpdateStatusLab(Request $request)
    {
        DB::table('teslab')
            ->where('id_lab', $request->id_data)
            ->update(['status' => $request->status_baru]);

        return redirect()->back()->with('success', 'Status pemeriksaan lab berhasil diperbarui!');
    }

   public function simpanBookingLab(Request $request)
{
    DB::beginTransaction();
    try {
        $jsonContent = $request->getContent();
        $data = json_decode($jsonContent, true);

        $userId = session()->get('user_id') ?? 1;
        if (empty($userId)) {
            $userId = 1;
        }

        // Ambil data dari JavaScript
        $paketNama     = $data['paket_nama'] ?? '-';
        $tanggal       = (!empty($data['tanggal'])) ? $data['tanggal'] : date('Y-m-d');
        $metode        = $data['metode'] ?? 'Walk-In';
        $kodeReferensi = $data['kode_referensi'] ?? 'LAB-' . rand(10000, 90000);
        $totalBiaya    = (!empty($data['total_biaya'])) ? intval($data['total_biaya']) : 0;

        // PERBAIKAN: Mengubah 'paket_name' menjadi 'paket_nama' sesuai kolom phpMyAdmin nomor 3
        DB::table('teslab')->insert([
            'user_id'        => $userId,
            'paket_nama'     => $paketNama, // <-- Di sini kuncinya!
            'tanggal'        => $tanggal,
            'metode'         => $metode,
            'kode_referensi' => $kodeReferensi,
            'total_biaya'    => $totalBiaya,
            'status'         => 'Diproses'
        ]);

        DB::commit();

        return response()->json([
            'status' => 'success',
            'message' => 'Data booking lab berhasil disimpan ke database.'
        ]);

    } catch (\Exception $e) {
        DB::rollBack();
        
        return response()->json([
            'status' => 'error',
            'message' => 'Terjadi kesalahan internal server: ' . $e->getMessage()
        ], 500);
    }
}

    public function asuransi() {
    $userId = session()->get('user_id');
    // Mengambil data spesifik user dan semua data untuk admin
    $data = DB::table('asuransi')->where('user_id', $userId)->get();
    $dataAsuransi = DB::table('asuransi')->get(); 

    return view('asuransi', compact('data', 'dataAsuransi'));
}


   public function simpanAsuransi(Request $request) 
{
    $data = $request->json()->all();
    $userId = session()->get('user_id') ?? 1;
    $idProposal = 'POLIS-' . rand(100000, 999999);

    DB::table('asuransi')->insert([
        'user_id'          => $userId,
        'nama_lengkap'     => $data['nama_lengkap'], // Masuk ke kolom baru
        'nama_poli'        => $data['nama_poli'],    // Sekarang kolom ini benar isinya paket
        'nomor_hp'         => $data['nomor_hp'],
        'metode_autodebet' => $data['metode_autodebet'],
        'id_proposal'      => $idProposal,
        'status_verifikasi'=> 'Pending'
    ]);

    return response()->json(['status' => 'success', 'id_proposal' => $idProposal]);
}

public function updateStatus(Request $request, $id)
{
    // Pengecekan keamanan manual
    if (Auth::user()->status !== 'admin') {
        return redirect('/beranda')->with('error', 'Akses ditolak!');
    }

    // Proses update
    DB::table('asuransi')
        ->where('id_asuransi', $id) // Pastikan nama kolom ID sesuai DB
        ->update(['status_verifikasi' => $request->status_verifikasi]);

    return redirect()->back()->with('success', 'Status berhasil diperbarui!');
}

    // --- 🛒 Fitur: Beli Obat ---
   public function beliobat() {
    // 1. Mengambil data master untuk katalog obat (Sisi User)
    $obat = DB::table('beliobat')->get();

    // 2. Mengambil data transaksi belanjaan dari tabel baru (Sisi Admin)
    try {
        $data_pesanan = DB::table('pesanan_obat')->orderBy('id', 'desc')->get();
    } catch (\Exception $e) {
        $data_pesanan = []; // Pengaman agar tidak error jika tabel belum dibuat
    }

    // 3. Mengirimkan kedua data ke file view beliobat.blade.php
    return view('beliobat', [
        'obat'         => $obat,
        'data_pesanan' => $data_pesanan
    ]);
}


   
    // Tambahkan kedua fungsi ini di dalam class HealthcareController:
public function adminDashboard()
{
    // Mengambil data dari tabel beliobat dan janjimedis memakai Query Builder Laravel
    $dataobat = DB::table('beliobat')->orderBy('idbeli', 'desc')->get();
    $datajanji = DB::table('janjimedis')->orderBy('idantrean', 'desc')->get();

    // Mengirimkan data ke file view bernama admin.blade.php
    return view('admin', compact('dataobat', 'datajanji'));
}

public function adminUpdateStatus(Request $request)
{
    $id = $request->iddata;
    $tipe = $request->tipelayanan; // ini untuk membedakan 'obat' atau 'janji'
    $statusbaru = $request->statusbaru;

    if ($tipe === 'obat') {
        // Nyasar ke tabel beliobat
        DB::table('beliobat')->where('idbeli', $id)->update(['status' => $statusbaru]);
    } else if ($tipe === 'janji') {
        // Nyasar ke tabel janjimedis
        DB::table('janjimedis')->where('idantrean', $id)->update(['status' => $statusbaru]);
    }

    return redirect()->back()->with('success', 'Status berhasil diperbarui!');
}

// 1. Fungsi untuk memproses data dari Keranjang Belanja HTML (User)
public function simpanPesananObat(Request $request)
{
    // Tangkap data json dari Fetch API JavaScript
    $data = $request->json()->all();

    // Satukan array nama obat keranjang menjadi satu teks kalimat
    $detail_obat = [];
    foreach ($data['keranjang'] as $item) {
        $detail_obat[] = $item['nama'] . " (" . $item['qty'] . "x)";
    }
    $list_obat = implode(", ", $detail_obat);

    // Insert ke tabel baru: pesanan_obat
    DB::table('pesanan_obat')->insert([
        'nama_obat' => $list_obat,
        'total_harga' => $data['total_harga'],
        'alamat' => $data['alamat'],
        'kurir' => $data['kurir'],
        'metode_pembayaran' => $data['metode_bayar'],
        'status' => 'Diproses'
    ]);

    return response()->json([
        'status' => 'success',
        'message' => 'Booking lab berhasil disimpan!'
    ]);
}


// 2. Tampilan Dashboard Admin khusus Pemesanan Obat
public function adminObatDashboard()
{
    $data_pesanan = DB::table('pesanan_obat')->orderBy('id', 'desc')->get();
    return view('admin_obat', compact('data_pesanan'));
}

// 3. Aksi Admin Mengubah Status Pesanan Obat
public function adminUpdateStatusObat(Request $request)
{
    DB::table('pesanan_obat')
        ->where('id', $request->id_data)
        ->update(['status' => $request['status_baru']]);

    return redirect()->back()->with('success', 'Status pesanan obat berhasil diperbarui!');
}

public function storeObat(Request $request) 
{
    DB::table('beliobat')->insert([
        'NamaObat' => $request->NamaObat,
        'indikasi' => $request->indikasi,
        'kategori' => $request->kategori,
        'stok'     => $request->stok,
        'harga'    => $request->harga
    ]);

    return redirect()->back()->with('success', 'Obat berhasil ditambahkan!');
}

 
    public function register() 
    {
        return view('register'); // Pastikan file resources/views/register.blade.php ada
    }

    public function registerProcess(Request $request) 
    {
        // 1. Validasi
        $request->validate([
            'nama_lengkap'      => 'required',
            'nik'               => 'required',
            'email'             => 'required|email|unique:users,email',
            'password'          => 'required|min:3', // Sesuai contoh Anda yang pakai "123"
            'foto_berkas'       => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // 2. Upload File
        $nama_foto_baru = null;
        if ($request->hasFile('foto_berkas')) {
            $file = $request->file('foto_berkas');
            $nama_foto_baru = time() . "_" . $request->nik . "." . $file->getClientOriginalExtension();
            // Pastikan folder public/uploads sudah ada!
            $file->move(public_path('uploads'), $nama_foto_baru);
        }

        // 3. Insert ke Database
        try {
            DB::table('users')->insert([
                'nama_lengkap'      => $request->nama_lengkap,
                'nik'               => $request->nik,
                'tempat_lahir'      => $request->tempat_lahir,
                'tanggal_lahir'     => $request->tanggal_lahir,
                'jenis_kelamin'     => $request->jenis_kelamin,
                'jaminan_kesehatan' => $request->jaminan_kesehatan,
                'foto_berkas'       => $nama_foto_baru,
                'email'             => $request->email,
                'password'          => Hash::make($request->password),
                'alamat_lengkap'    => $request->alamat_lengkap,
                'status'            => 'user',
            ]);

            return redirect('/login')->with('success', 'Pendaftaran berhasil!');
        } catch (\Exception $e) {
            // Jika gagal, akan muncul pesan error di layar
            return back()->with('error', 'Gagal menyimpan ke database: ' . $e->getMessage());
        }
    }

public function showProfil() 
    {
        // Gunakan Auth::id() agar lebih aman dan konsisten
        $user = DB::table('users')->where('id', Auth::id())->first();
        return view('profil', compact('user'));
    }

    public function updateProfil(Request $request) 
    {
        $userId = Auth::id();

        DB::table('users')->where('id', $userId)->update([
            'nama_lengkap'      => $request->nama_lengkap,
            'email'             => $request->email,
            'nik'               => $request->nik,
            'tempat_lahir'      => $request->tempat_lahir,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'jaminan_kesehatan' => $request->jaminan_kesehatan,
            'alamat_lengkap'    => $request->alamat_lengkap,
        ]);

        return redirect()->back()->with('success', 'Profil berhasil diupdate!');
    }

public function updateFoto(Request $request) 
{
    // 1. Cek apakah request benar-benar mengirim file
    if (!$request->hasFile('foto')) {
        return redirect()->back()->with('error', 'File tidak terdeteksi oleh sistem.');
    }

    // 2. Validasi
    $request->validate([
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);
    
    // 3. Simpan
    try {
        $path = $request->file('foto')->store('profiles', 'public');
        
        \Illuminate\Support\Facades\DB::table('users')
            ->where('id', \Illuminate\Support\Facades\Auth::id())
            ->update(['foto' => $path]);
            
        return redirect()->back()->with('success', 'Foto berhasil disimpan!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error Database: ' . $e->getMessage());
    }
}
public function caridokter($id) {
        $konsultasi = DB::table('konsultasi')->where('dokter_id', $id)->get();
        return view('index', ['konsultasi' => $konsultasi]);
    }
}



