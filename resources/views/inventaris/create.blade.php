<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Inventaris</title>
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
        <h2 class="text-center">Tambah Inventaris</h2>
        <form action="/inventaris" method="POST">
            @csrf
            <div class="mb-3">
                <label for="id_inventaris">Id Inventaris</label>
                <input type="text" id="id_inventaris" name="id_inventaris" class="form-control" placeholder="ID Inventaris" required>
            </div>
            <div class="mb-3">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
            </div>
            <div class="mb-3">
                <label for="kondisi">Kondisi</label>
                <select id="kondisi" name="kondisi" class="form-control">
                    <option value="Baik">Baik</option>
                    <option value="Rusak">Rusak</option>
                    <option value="Perbaikan">Perbaikan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="stok">Stok</label>
                <input type="number" id="stok" name="stok" class="form-control" placeholder="Stok" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_register">Tanggal Register</label>
                <input type="date" id="tanggal_register" name="tanggal_register" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Simpan</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>