<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OutgoingLetter; // Baris ini sudah benar ada di sini

class SuratKeluarController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari model OutgoingLetter
        $SuratKeluar = OutgoingLetter::all();

        // Mengirimkan variabel $SuratKeluar ke view
        return view('surat-keluar.index', compact('SuratKeluar')); 
    }

    public function show($id)
    {
        // Mencari data surat berdasarkan ID
        $surat = OutgoingLetter::findOrFail($id);

        // Mengirimkan variabel $surat ke view
        return view('surat-keluar.show', compact('surat'));
    }
}