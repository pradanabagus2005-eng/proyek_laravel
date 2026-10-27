@extends('layouts.app')

@section('content')
<h1>Halaman Surat Keluar</h1>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor Surat</th>
            <th>Tanggal</th>
            <th>Tujuan</th>
            <th>Perihal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <!-- Menggunakan forelse dan variabel $SuratKeluar dari Controller -->
        @forelse($SuratKeluar as $surat)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $surat->nomor_surat }}</td>
            <td>{{ $surat->tanggal }}</td>
            <!-- Menggunakan ->tujuan sesuai petunjuk -->
            <td>{{ $surat->tujuan }}</td> 
            <td>{{ $surat->perihal }}</td>
            <!-- Mengubah $surat['id'] menjadi $surat->id -->
            <td><a href="{{ route('surat-keluar.show', $surat->id) }}">Detail</a></td>
        </tr>
        @empty
        <!-- Menampilkan pesan ini jika data di database masih kosong -->
        <tr>
            <td colspan="6" style="text-align: center;">Belum ada data surat keluar.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection