<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Form Peminjam</h1>

    <form action="{{route('peminjaman.store')}}" method="post">
        <label for="id_inventaris">Nama Barang</label>
        <option value="id_inventaris">
            @foreach ($inventaris as $item)
                <select name="{{$item->id_inventaris}}" id="" >{{$item->nama_barang}}</select>
            @endforeach
        </option>
        <label for="tanggal_pinjam">Tanggal Peminjam</label>
        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam">
        <label for="nama_peminjam">Nama Peminjam</label>
        <input type="text" name="nama_peminjam" id="nama_peminjam">
    </form>
</body>
</html>