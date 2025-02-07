<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Inventaris</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Tambah Inventaris</h2>
        <form action="/inventaris" method="POST">
            @csrf
            <label for="">Id inventaris</label>
            <input type="text" name="id_inventaris" class="form-control mb-2" placeholder="ID Inventaris" required>
            <label for="">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control mb-2" placeholder="Nama Barang" required>
            <label for="">Kondisi</label>
            <select name="kondisi" class="form-control mb-2">
                <option value="Baik">Baik</option>
                <option value="Rusak">Rusak</option>
                <option value="Perbaikan">Perbaikan</option>
            </select>
            <label for="">Stok</label>
            <input type="text" name="stok" class="form-control mb-2" placeholder="stok" required>
            <label for="">Tanggal Registeer</label>
            <input type="date" name="tanggal_register" class="form-control mb-2" placeholder="tanggal_register" required>
            <button type="submit" class="btn btn-success w-100">Simpan</button>
        </form>
    </div>
</body>
</html>
