<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OutgoingLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    // 1. Menampilkan daftar surat keluar (pencarian, filter kategori, & pagination)
    public function index(Request $request)
    {
        $query = OutgoingLetter::with('category');

        if ($request->filled('q')) {
            $q = $request->input('q');
            $query->where(function ($builder) use ($q) {
                $builder->where('nomor_surat', 'like', "%{$q}%")
                    ->orWhere('tujuan', 'like', "%{$q}%")
                    ->orWhere('perihal', 'like', "%{$q}%");
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        $suratKeluar = $query->latest('id')->paginate(5)->withQueryString();
        $categories = Category::orderBy('nama')->get();

        return view('surat-keluar.index', compact('suratKeluar', 'categories'));
    }

    // 2. Menampilkan form tambah
    public function create()
    {
        $categories = Category::orderBy('nama')->get();

        return view('surat-keluar.create', compact('categories'));
    }

    // 3. Memvalidasi & menyimpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal'     => 'required|date',
            'tujuan'      => 'required|string|max:255',
            'perihal'     => 'required|string|max:255',
            'keterangan'  => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'lampiran'    => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('lampiran')) {
            $validated['lampiran'] = $request->file('lampiran')
                ->store('lampiran-surat-keluar', 'public');
        }

        OutgoingLetter::create($validated);

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil ditambahkan.');
    }

    // 4. Menampilkan detail surat keluar
    public function show($id)
    {
        $surat = OutgoingLetter::with('category')->findOrFail($id);

        return view('surat-keluar.show', compact('surat'));
    }

    // 5. Menampilkan form edit
    public function edit($id)
    {
        $surat = OutgoingLetter::findOrFail($id);
        $categories = Category::orderBy('nama')->get();

        return view('surat-keluar.edit', compact('surat', 'categories'));
    }

    // 6. Memvalidasi & memperbarui data
    public function update(Request $request, $id)
    {
        $surat = OutgoingLetter::findOrFail($id);

        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal'     => 'required|date',
            'tujuan'      => 'required|string|max:255',
            'perihal'     => 'required|string|max:255',
            'keterangan'  => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'lampiran'    => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('lampiran')) {
            $pathLama = $surat->lampiran;
            $validated['lampiran'] = $request->file('lampiran')
                ->store('lampiran-surat-keluar', 'public');
            $surat->update($validated);

            if ($pathLama) {
                Storage::disk('public')->delete($pathLama);
            }
        } else {
            unset($validated['lampiran']);
            $surat->update($validated);
        }

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil diperbarui.');
    }

    // 7. Menghapus data
    public function destroy($id)
    {
        $surat = OutgoingLetter::findOrFail($id);
        $path = $surat->lampiran;
        $surat->delete();

        if ($path) {
            Storage::disk('public')->delete($path);
        }

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil dihapus.');
    }
}