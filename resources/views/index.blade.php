<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// class HealthcareController extends Controller
// {
//     // --- 🏠 Navigasi Halaman Utama ---
//     public function home() { return view('home'); }
//     public function layanan() { return view('layanan'); }
//     public function artikel() { return view('artikel'); }
//     public function bantuan() { return view('bantuan'); }
//     public function riwayat() { return view('riwayat'); }
//     public function konsultasi() { return view('konsultasi'); }
//     public function profil() {
//         $user = DB::table('users')->where('id', 0)->first();
//         return view('profil', ['user' => $user]);
//     }

//     // --- 🏥 Fitur: Booking & Layanan Medis ---
//     public function janjiMedis() { // Gunakan CamelCase (janjiMedis)
//         $janji = DB::table('janjimedis')->get();
//         return view('janjimedis', ['data' => $janji]);
//     }

//     public function tesLab() {
//         $lab = DB::table('teslab')->get();
//         return view('teslab', ['data' => $lab]);
//     }

//     public function asuransi() {
//         $asuransi = DB::table('asuransi')->get();
//         return view('asuransi', ['data' => $asuransi]);
//     }

//     // --- 🛒 Fitur: Beli Obat ---
//     public function index() {
//         $obat = DB::table('beliobat')->get();
//         return view('index', ['obat' => $obat]);
//     }

//     public function tambahObat(Request $request) {
//         DB::table('beliobat')->insert([
//             'NamaObat' => $request->NamaObat,
//             'indikasi' => $request->indikasi,
//             'kategori' => $request->kategori,
//             'stok'     => $request->stok,
//             'harga'    => $request->harga,
//         ]);
//         return response()->json(['success' => true]);
//     }
// }