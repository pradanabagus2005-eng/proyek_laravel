@extends('layouts.app')

@section('title', 'Surat Masuk')

@section('content')
    <h1>Daftar Surat Masuk</h1>
    <table border="1" cellpadding="8">
        <thead>
            <tr> <!-- Tambahkan tag tr ini -->
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Tanggal</th>
                <th>Pengirim</th>
                <th>Perihal</th>
                <th>Aksi</th>
            </tr> <!-- Tutup tag tr -->
        </thead>
        <tbody>
            @forelse ($SuratMasuk as $surat) <!-- Gunakan forelse dan huruf S besar -->
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $surat->nomor_surat }}</td>
                <td>{{ $surat->tanggal }}</td>
                <td>{{ $surat->pengirim }}</td>
                <td>{{ $surat->perihal }}</td>
                <td>
                    <a href="{{ route('surat-masuk.show', $surat->id) }}">Detail</a>
                </td>
            </tr>
            @empty <!-- Tambahkan kondisi jika data kosong -->
            <tr>
                <td colspan="6">belum ada surat masuk.</td>
            </tr>
            @endforelse <!-- Gunakan endforelse -->
        </tbody>
    </table>
@endsection <!-- Pastikan ada penutup section -->