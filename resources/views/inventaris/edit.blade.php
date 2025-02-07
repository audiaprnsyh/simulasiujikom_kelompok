<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Inventaris</title>
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
        <ul class="nav flex-column mt-4">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">Beranda</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('inventaris.create') }}" class="nav-link">Tambah Inventaris</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('inventaris.index') }}" class="nav-link">Kelola Inventaris</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>

    <div class="content">
        <h2 class="text-center">Edit Inventaris</h2>

        <form action="{{ route('inventaris.update', $inventari->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="id_inventaris" class="form-label">ID Inventaris</label>
                <input type="text" class="form-control" id="id_inventaris" name="id_inventaris" value="{{ $inventari->id_inventaris }}">
            </div>

            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $inventari->nama_barang }}" required>
            </div>

            <div class="mb-3">
                <label for="kondisi" class="form-label">Kondisi</label>
                <select class="form-control" id="kondisi" name="kondisi">
                    <option value="Baik" {{ $inventari->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
                    <option value="Rusak" {{ $inventari->kondisi == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                    <option value="Perbaikan" {{ $inventari->kondisi == 'Perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" value="{{ $inventari->stok }}" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_register" class="form-label">Tanggal Register</label>
                <input type="date" class="form-control" id="tanggal_register" name="tanggal_register" value="{{ $inventari->tanggal_register }}" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
        </form>

        <a href="/inventaris" class="btn btn-secondary mt-3 w-100">Kembali</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>