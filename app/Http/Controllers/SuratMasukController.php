<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncomingLetter; // Pastikan Anda menambahkan baris ini agar model dikenali

class SuratMasukController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel incoming_letters
        $SuratMasuk = IncomingLetter::all();
        
        return view('surat-masuk.index', compact('SuratMasuk'));
    }

    public function show($id)
    {
        // Mencari data surat berdasarkan ID, jika tidak ada akan muncul error 404
        $surat = IncomingLetter::findOrFail($id);
        
        return view('surat-masuk.show', compact('surat'));
    }
}