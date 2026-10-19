<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Surat Masuk</title>
</head>
<body>
    <h1>Halaman Detail Surat Masuk</h1>
    @if($suratShow)
    <p>
        <strong>Nomor Surat</strong>
        {{ $suratShow['nomor_surat'] }}
    </p>

     <p>
        <strong>tanggal</strong>
        {{ $suratShow['tanggal'] }}
    </p>

     <p>
        <strong>pengirim</strong>
        {{ $suratShow['pengirim'] }}
    </p>

     <p>
        <strong>perihal</strong>
        {{ $suratShow['perihal'] }}
    </p>
    @else
        <p>Surat tidak ditemukan</p>
    @endif

    <a href="{{route('surat-masuk.index')}}">kembali</a>
</body>
</html>