@extends('layouts.app')
@section('title', 'Detail Surat Keluar')

@section('content')
<a href="{{ route('surat-keluar.index') }}" class="mb-4 inline-flex items-center gap-1.5 text-sm text-slate-500 hover:text-slate-800">
    <x-icon name="arrow-left" class="size-4" />
    Kembali ke daftar
</a>
<h1 class="page-title mb-6">Detail Surat Keluar</h1>

<div class="card max-w-3xl">
    <dl class="divide-y divide-stone-100">
        <div class="grid gap-1 px-6 py-4 sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm text-slate-500">Nomor</dt>
            <dd class="text-slate-900 sm:col-span-2">{{ $surat->nomor_surat }}</dd>
        </div>
        <div class="grid gap-1 px-6 py-4 sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm text-slate-500">Tanggal</dt>
            <dd class="text-slate-900 sm:col-span-2">{{ $surat->tanggal }}</dd>
        </div>
        <div class="grid gap-1 px-6 py-4 sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm text-slate-500">Tujuan</dt>
            <dd class="text-slate-900 sm:col-span-2">{{ $surat->tujuan }}</dd>
        </div>
        <div class="grid gap-1 px-6 py-4 sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm text-slate-500">Perihal</dt>
            <dd class="text-slate-900 sm:col-span-2">{{ $surat->perihal }}</dd>
        </div>
        <div class="grid gap-1 px-6 py-4 sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm text-slate-500">Kategori</dt>
            <dd class="text-slate-900 sm:col-span-2">{{ $surat->category?->nama ?? 'Tanpa kategori' }}</dd>
        </div>
        <div class="grid gap-1 px-6 py-4 sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm text-slate-500">Keterangan</dt>
            <dd class="whitespace-pre-line text-slate-900 sm:col-span-2">{{ $surat->keterangan ?? '-' }}</dd>
        </div>
        @if ($surat->lampiran)
        <div class="grid gap-1 px-6 py-4 sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm text-slate-500">Lampiran</dt>
            <dd class="text-slate-900 sm:col-span-2">
                <a href="{{ asset('storage/' . $surat->lampiran) }}" target="_blank" rel="noopener" class="font-medium text-blue-600 hover:underline">
                    Lihat lampiran
                </a>
            </dd>
        </div>
        @endif
    </dl>
</div>

<div class="mt-6">
    <a href="{{ route('surat-keluar.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection