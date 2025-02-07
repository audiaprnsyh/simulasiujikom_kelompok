<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Inventaris</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Edit Inventaris</h2>

        <form action="{{route('inventaris.update',$inventari->id)}}" method="POST">
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
</body>
</html>
