<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function index()
    {
        // Data surat untuk ditampilkan di tabel (file index.blade.php)
        $dataSurat = [
            ['id' => 1, 'nomor_surat' => '001/FT/X/2026', 'tanggal' => '13-10-2026', 'pengirim' => 'Fakultas Teknik', 'perihal' => 'Rapat'],
            ['id' => 2, 'nomor_surat' => '002/FT/X/2026', 'tanggal' => '13-10-2026', 'pengirim' => 'Mulyono', 'perihal' => 'Keluhan'],
            ['id' => 3, 'nomor_surat' => '003/FT/X/2026', 'tanggal' => '13-10-2026', 'pengirim' => 'faby', 'perihal' => 'Rapat'],
        ];

        return view('surat-keluar.index', compact('dataSurat')); 
    }

    public function show($id)
    {
        // Data statis sementara untuk halaman detail (file show.blade.php)
        $suratShow = (object) [
            'id' => $id,
            'nomor_surat' => '001/FT/X/2026',
            'tanggal' => '13-10-2026',
            'pengirim' => 'Fakultas Teknik',
            'perihal' => 'Rapat'
        ];

        return view('surat-keluar.show', compact('suratShow'));
    }
}