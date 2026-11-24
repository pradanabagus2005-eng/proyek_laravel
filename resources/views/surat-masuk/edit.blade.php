@extends('layouts.app')
@section('title', 'Edit Surat Masuk')

@section('content')
<a href="{{ route('surat-masuk.index') }}" class="mb-4 inline-flex items-center gap-1.5 text-sm text-slate-500 hover:text-slate-800">
    <x-icon name="arrow-left" class="size-4" />
    Kembali ke daftar
</a>
<h1 class="page-title mb-6">Edit Surat Masuk</h1>

<form action="{{ route('surat-masuk.update', $surat->id) }}" method="POST" enctype="multipart/form-data" class="card max-w-3xl">
    @csrf
    @method('PUT')

    <div class="grid gap-5 p-6 sm:grid-cols-2">
        <div>
            <label for="nomor_surat" class="label">Nomor Surat</label>
            <input id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat', $surat->nomor_surat) }}" class="input">
            @error('nomor_surat') <span class="field-error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="tanggal" class="label">Tanggal</label>
            <input id="tanggal" type="date" name="tanggal" value="{{ old('tanggal', $surat->tanggal) }}" class="input">
            @error('tanggal') <span class="field-error">{{ $message }}</span> @enderror
        </div>
        <div class="sm:col-span-2">
            <label for="pengirim" class="label">Pengirim</label>
            <input id="pengirim" name="pengirim" value="{{ old('pengirim', $surat->pengirim) }}" class="input">
            @error('pengirim') <span class="field-error">{{ $message }}</span> @enderror
        </div>
        <div class="sm:col-span-2">
            <label for="perihal" class="label">Perihal</label>
            <input id="perihal" name="perihal" value="{{ old('perihal', $surat->perihal) }}" class="input">
            @error('perihal') <span class="field-error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="category_id" class="label">Kategori</label>
            <select id="category_id" name="category_id" class="input">
                <option value="">-- Tanpa kategori --</option>
                @foreach ($categories as $kategori)
                    <option value="{{ $kategori->id }}" @selected(old('category_id', $surat->category_id ?? '') == $kategori->id)>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <span class="field-error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="lampiran" class="label">Lampiran (PDF/JPG/PNG, maks. 2 MB)</label>
            <input id="lampiran" type="file" name="lampiran" accept=".pdf,.jpg,.jpeg,.png" class="input file:mr-3 file:rounded file:border-0 file:bg-slate-100 file:px-3 file:py-1 file:text-sm file:font-medium file:text-slate-700 hover:file:bg-slate-200">
            @error('lampiran') <span class="field-error">{{ $message }}</span> @enderror
        </div>
        <div class="sm:col-span-2">
            <label for="keterangan" class="label">Keterangan</label>
            <textarea id="keterangan" name="keterangan" rows="4" class="input">{{ old('keterangan', $surat->keterangan) }}</textarea>
            @error('keterangan') <span class="field-error">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="flex items-center gap-3 rounded-b-lg border-t border-stone-200 bg-stone-50 px-6 py-4">
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('surat-masuk.index') }}" class="btn btn-secondary">Batal</a>
    </div>
</form>
@endsection