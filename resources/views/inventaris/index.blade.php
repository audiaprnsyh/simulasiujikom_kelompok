<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Inventaris</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
<body>
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

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Inventaris</th>
                    <th>Nama Barang</th>
                    <th>Kondisi</th>
                    <th>Stok</th>
                    <th>Tanggal Register</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inventaris as $item)
                <tr>
                    <td>{{ $item->id_inventaris }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->kondisi }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>{{ $item->tanggal_register }}</td>
                    <td>
                        <a href="{{ route('inventaris.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="/inventaris/{{ $item->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus item ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>