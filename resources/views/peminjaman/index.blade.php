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
            @foreach ($peminjaman as $item)
                <td>{{$item->id}}</td>
                <td>{{$item->inventaris->id_inventaris}}</td>
                <td>{{$item->inventaris->nama_barang}}</td>
                <td>{{$item->nama_peminjam}}</td>
                <td>{{$item->tanggal_pinjam}}</td>
                <td>{{$item->tanggal_kembali}}</td>
                <td>
                    <form action="{{route('peminjaman.updateStatus')}}" method="post">
                        @csrf
                        @method('PUT')
                        <select name="status" class="form-select form-select-sm @if(!$item->status) text-muted
                            @elsif($item->status == 'belum_kembali') text-danger
                            @elsif($item->status == 'sudah_kembali') text-succes
                            @elsif($item->status == 'proses') text-warning
                            @else text-secondary @endif"
                                onchange="if(confirm('Yakin Mengubah Status?')) this.form.submit()">
                            <option value="" {{!$item->status ? 'selected' : ''}} disabled>Pilih Status</option>
                            <option value="belum_kembali" {{$item-> 'belum_kembali' ? 'selected' : ''}}>Belum Kembali</option>
                            <option value="sudah_kembali" {{$item-> 'sudah_kembali' ? 'selected' : ''}}>Sudah_Kembali</option>
                            <option value="proses" {{$item-> 'proses' ? 'selected' : ''}}>Proses</option>
                            <option value="batal" {{$item-> 'batal' ? 'selected' : ''}}>Batal</option>
                        </select>
                    </form>
                </td>
                <td>{{$item->petugas}}</td>
            @endforeach
        </tbody>
    </table>
</body>
</html>