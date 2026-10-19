<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>halaman surat  masuk</h1>
    
    <table border="1" cellpadding="10">
        <thead>
            <th>no</th>
            <th>nomor_surat</th>
            <th>tanggal</th>
            <th>pengirim</th>
            <th>perihal</th>
            <th>AKsi</th>
        </thead>

        <tbody>
            @foreach($suratMasuk as $surat)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $surat['nomor_surat'] }}</td>
                <td>{{ $surat['tanggal'] }}</td>
                <td>{{ $surat['pengirim'] }}</td>
                <td>{{ $surat['perihal'] }}</td>
                <td>
                    <a href="{{route('surat-masuk.show',$surat['id'])}}">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>