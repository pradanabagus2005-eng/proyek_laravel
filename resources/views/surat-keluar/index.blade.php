@extends('layouts.app')
@section('title', 'Daftar Surat Keluar')

@section('content')
<div class="mb-6 flex flex-wrap items-end justify-between gap-4">
    <div>
        <h1 class="page-title">Daftar Surat Keluar</h1>
        <p class="mt-1 text-sm text-slate-500">Total {{ $suratKeluar->count() }} surat</p>
    </div>
    @can('manage-letters')
    <a href="{{ route('surat-keluar.create') }}" class="btn btn-primary">
        <x-icon name="plus" class="size-4" />
        Tambah Surat Keluar
    </a>
    @endcan
</div>

@if (session('success'))
<div class="mb-4 flex items-center gap-2 rounded-md border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
    <x-icon name="check" class="size-5 shrink-0" />
    <span>{{ session('success') }}</span>
</div>
@endif

<div class="card overflow-x-auto">
    <table class="min-w-full divide-y divide-stone-200 text-sm">
        <thead class="bg-stone-50 text-left text-slate-500">
            <tr>
                <th class="px-4 py-3 font-medium">No</th>
                <th class="px-4 py-3 font-medium">Nomor</th>
                <th class="px-4 py-3 font-medium">Tanggal</th>
                <th class="px-4 py-3 font-medium">Tujuan</th>
                <th class="px-4 py-3 font-medium">Perihal</th>
                <th class="px-4 py-3 font-medium">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-stone-100">
            @forelse ($suratKeluar as $surat)
            <tr class="hover:bg-stone-50">
                <td class="px-4 py-3 text-slate-500">{{ $loop->iteration }}</td>
                <td class="whitespace-nowrap px-4 py-3 font-medium text-slate-900">{{ $surat->nomor_surat }}</td>
                <td class="whitespace-nowrap px-4 py-3">{{ $surat->tanggal }}</td>
                <td class="px-4 py-3">{{ $surat->tujuan }}</td>
                <td class="px-4 py-3">{{ $surat->perihal }}</td>
                <td class="px-4 py-3">
                    <div class="flex items-center gap-2">
                        <a href="{{ route('surat-keluar.show', $surat->id) }}" class="act act-view">
                            <x-icon name="eye" class="size-4" />
                            Detail
                        </a>

                        @can('manage-letters')
                        <a href="{{ route('surat-keluar.edit', $surat->id) }}" class="act act-edit">
                            <x-icon name="pencil" class="size-4" />
                            Edit
                        </a>
                        <form action="{{ route('surat-keluar.destroy', $surat->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="act act-del" onclick="return confirm('Hapus surat keluar ini?')">
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
                <td colspan="6" class="px-4 py-14 text-center">
                    <x-icon name="document" class="mx-auto size-10 text-slate-300" />
                    <p class="mt-3 text-sm text-slate-500">Belum ada surat keluar.</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
