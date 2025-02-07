<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Id Peminjaman</th>
                <th>Id Inventaris</th>
                <th>Nama Barang</th>
                <th>Nama Peminjam</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Petugas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Peminjaman as $item)
                <th>{{$item->id}}</th>
                <th>{{$item->id_inventaris}}</th>
                <th>{{$item->nama_barang}}</th>
                <th>{{$item->nama_peminjam}}</th>
                <th>{{$item->tanggal_pinjam}}</th>
                <th>{{$item->tanggal_kembali}}</th>
                <th>{{$item->status}}</th>
                <th>{{$item->petugas}}</th>
            @endforeach
        </tbody>
    </table>
</body>
</html>