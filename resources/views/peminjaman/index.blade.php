<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styling for sidebar */
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            color: white;
        }

        .sidebar .nav-item {
            margin: 20px 0;
        }

        .sidebar .nav-link {
            color: white;
            font-size: 18px;
        }

        .sidebar .nav-link:hover {
            background-color: #495057;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="sidebar">
        <div class="d-flex justify-content-center mt-4">
            <h4>Admin Dashboard</h4>
        </div>
        @include('layouts.sidebar')
    </div>
    <div class="content">
        <h2 class="text-center">Data Inventaris</h2>
        <a href="/inventaris/create" class="btn btn-primary mb-3">Tambah Inventaris</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
                <table class="table table-bordered table-striped">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>ID Peminjaman</th>
                            <th>ID Inventaris</th>
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
                        <tr class="text-center">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->inventaris->id_inventaris }}</td>
                            <td>{{ $item->inventaris->nama_barang }}</td>
                            <td>{{ $item->nama_peminjam }}</td>
                            <td>{{ $item->tanggal_pinjam }}</td>
                            <td>{{ $item->tanggal_kembali ?? '-' }}</td>
                            <td>
                                <form action="{{ route('peminjaman.updateStatus', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-select form-select-sm 
                                        @if($item->status == 'belum kembali') text-danger
                                        @elseif($item->status == 'sudah kembali') text-success
                                        @elseif($item->status == 'proses') text-warning
                                        @else text-secondary 
                                        @endif"
                                        onchange="if(confirm('Yakin Mengubah Status?')) this.form.submit()">
                                        
                                        <option value="" disabled>Pilih Status</option>
                                        <option value="belum kembali" {{ $item->status == 'belum kembali' ? 'selected' : '' }}>Belum Kembali</option>
                                        <option value="sudah kembali" {{ $item->status == 'sudah kembali' ? 'selected' : '' }}>Sudah Kembali</option>
                                        <option value="proses" {{ $item->status == 'proses' ? 'selected' : '' }}>Proses</option>
                                        <option value="batal" {{ $item->status == 'batal' ? 'selected' : '' }}>Batal</option>
                                    </select>
                                </form>
                            </td>
                            <td>{{ $item->petugas->name ?? '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
