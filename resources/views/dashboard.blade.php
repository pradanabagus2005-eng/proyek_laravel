@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="page-title mb-6">Dashboard</h1>

    <div class="rounded-xl bg-slate-900 p-6 text-white sm:p-8">
        <p class="text-sm text-slate-400">Halo, {{ auth()->user()->name }}</p>
        <p class="mt-1 text-2xl font-semibold tracking-tight">
            Selamat Datang Di Sistem Informasi Surat
        </p>
        <p class="mt-3 max-w-xl text-sm text-slate-300">
            @can('manage-letters')
                Kamu dapat menambah, mengubah, dan menghapus data surat masuk maupun surat keluar.
            @else
                Kamu dapat melihat daftar dan detail surat masuk maupun surat keluar.
            @endcan
        </p>
    </div>

    <div class="mt-6 grid gap-4 sm:grid-cols-2">
        <a href="{{ route('surat-masuk.index') }}" class="card group flex items-start gap-4 p-5 transition-colors hover:border-teal-600">
            <span class="flex size-11 shrink-0 items-center justify-center rounded-lg bg-teal-50 text-teal-700">
                <x-icon name="inbox" class="size-6" />
            </span>
            <span>
                <span class="block text-lg font-medium text-slate-900">Surat Masuk</span>
                <span class="mt-0.5 block text-sm text-slate-500">Lihat daftar surat yang diterima</span>
            </span>
        </a>
        <a href="{{ route('surat-keluar.index') }}" class="card group flex items-start gap-4 p-5 transition-colors hover:border-teal-600">
            <span class="flex size-11 shrink-0 items-center justify-center rounded-lg bg-amber-50 text-amber-700">
                <x-icon name="outbox" class="size-6" />
            </span>
            <span>
                <span class="block text-lg font-medium text-slate-900">Surat Keluar</span>
                <span class="mt-0.5 block text-sm text-slate-500">Lihat daftar surat yang dikirim</span>
            </span>
        </a>
    </div>
@endsection
