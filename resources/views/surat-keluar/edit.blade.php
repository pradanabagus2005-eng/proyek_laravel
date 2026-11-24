@extends('layouts.app')
@section('title', 'Edit Surat Keluar')

@section('content')
<a href="{{ route('surat-keluar.index') }}" class="mb-4 inline-flex items-center gap-1.5 text-sm text-slate-500 hover:text-slate-800">
    <x-icon name="arrow-left" class="size-4" />
    Kembali ke daftar
</a>
<h1 class="page-title mb-6">Edit Surat Keluar</h1>

<form action="{{ route('surat-keluar.update', $surat->id) }}" method="POST" class="card max-w-3xl">
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
            <label for="tujuan" class="label">Tujuan</label>
            <input id="tujuan" name="tujuan" value="{{ old('tujuan', $surat->tujuan) }}" class="input">
            @error('tujuan') <span class="field-error">{{ $message }}</span> @enderror
        </div>
        <div class="sm:col-span-2">
            <label for="perihal" class="label">Perihal</label>
            <input id="perihal" name="perihal" value="{{ old('perihal', $surat->perihal) }}" class="input">
            @error('perihal') <span class="field-error">{{ $message }}</span> @enderror
        </div>
        <div class="sm:col-span-2">
            <label for="keterangan" class="label">Keterangan</label>
            <textarea id="keterangan" name="keterangan" rows="4" class="input">{{ old('keterangan', $surat->keterangan) }}</textarea>
            @error('keterangan') <span class="field-error">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="flex items-center gap-3 rounded-b-lg border-t border-stone-200 bg-stone-50 px-6 py-4">
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('surat-keluar.index') }}" class="btn btn-secondary">Batal</a>
    </div>
</form>
@endsection
