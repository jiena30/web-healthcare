<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KonsultasiController extends Controller
{
   
       // Pastikan nama tabelnya adalah 'konsultasi' (sesuai screenshot Anda)
public function prosesPembayaran(Request $request)
{
    try {

        DB::table('konsultasi')->insert([
            'user_id'       => 1,
            'dokter_id'     => $request->dokter_id,
            'tanggal_janji' => $request->tanggal,
            'jam_janji'     => $request->jam,
            'jenis_pasien'  => $request->jenis_pasien,
            'metode_bayar'  => $request->metode_bayar,
            'status'        => 'lunas',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        return response()->json([
            'success' => true
        ]);

    } catch (\Exception $e) {

        return response()->json([
            'success' => false,
            'error' => $e->getMessage()
        ]);
    }
}
}

