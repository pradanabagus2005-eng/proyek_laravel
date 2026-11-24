@extends('layouts.app')
@section('title', 'Daftar Surat Masuk')

@section('content')
<div class="mb-6 flex flex-wrap items-end justify-between gap-4">
    <div>
        <h1 class="page-title">Daftar Surat Masuk</h1>
        <p class="mt-1 text-sm text-slate-500">Total {{ $suratMasuk->total() }} surat</p>
    </div>
    @can('manage-letters')
    <a href="{{ route('surat-masuk.create') }}" class="btn btn-primary">
        <x-icon name="plus" class="size-4" />
        Tambah Surat
    </a>
    @endcan
</div>

@if (session('success'))
<div class="mb-4 flex items-center gap-2 rounded-md border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
    <x-icon name="check" class="size-5 shrink-0" />
    <span>{{ session('success') }}</span>
</div>
@endif

<form method="GET" action="{{ route('surat-masuk.index') }}" class="card mb-4 flex flex-wrap items-center gap-3 p-4">
    <div class="min-w-[220px] flex-1">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Nomor, pengirim, atau perihal" class="input">
    </div>
    <div class="w-full sm:w-56">
        <select name="category_id" class="input">
            <option value="">Semua kategori</option>
            @foreach ($categories as $kategori)
                <option value="{{ $kategori->id }}" @selected(request('category_id') == $kategori->id)>
                    {{ $kategori->nama }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="flex items-center gap-2">
        <button type="submit" class="btn btn-primary">Cari / Filter</button>
        <a href="{{ route('surat-masuk.index') }}" class="btn btn-secondary">Reset</a>
    </div>
</form>

<div class="card overflow-x-auto">
    <table class="min-w-full divide-y divide-stone-200 text-sm">
        <thead class="bg-stone-50 text-left text-slate-500">
            <tr>
                <th class="px-4 py-3 font-medium">No</th>
                <th class="px-4 py-3 font-medium">Nomor</th>
                <th class="px-4 py-3 font-medium">Tanggal</th>
                <th class="px-4 py-3 font-medium">Pengirim</th>
                <th class="px-4 py-3 font-medium">Perihal</th>
                <th class="px-4 py-3 font-medium">Kategori</th>
                <th class="px-4 py-3 font-medium">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-stone-100">
            @forelse ($suratMasuk as $surat)
            <tr class="hover:bg-stone-50">
                <td class="px-4 py-3 text-slate-500">{{ $suratMasuk->firstItem() + $loop->index }}</td>
                <td class="whitespace-nowrap px-4 py-3 font-medium text-slate-900">{{ $surat->nomor_surat }}</td>
                <td class="whitespace-nowrap px-4 py-3">{{ $surat->tanggal }}</td>
                <td class="px-4 py-3">{{ $surat->pengirim }}</td>
                <td class="px-4 py-3">{{ $surat->perihal }}</td>
                <td class="whitespace-nowrap px-4 py-3">{{ $surat->category?->nama ?? 'Tanpa kategori' }}</td>
                <td class="px-4 py-3">
                    <div class="flex items-center gap-2">
                        <a href="{{ route('surat-masuk.show', $surat->id) }}" class="act act-view">
                            <x-icon name="eye" class="size-4" />
                            Detail
                        </a>

                        @can('manage-letters')
                        <a href="{{ route('surat-masuk.edit', $surat->id) }}" class="act act-edit">
                            <x-icon name="pencil" class="size-4" />
                            Edit
                        </a>
                        <form action="{{ route('surat-masuk.destroy', $surat->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="act act-del" onclick="return confirm('Hapus surat ini?')">
                                <x-icon name="trash" class="size-4" />
                                Hapus
                            </button>
                        </form>
                        @endcan
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="px-4 py-14 text-center">
                    <x-icon name="document" class="mx-auto size-10 text-slate-300" />
                    <p class="mt-3 text-sm text-slate-500">Belum ada surat masuk.</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $suratMasuk->links() }}
</div>
@endsection