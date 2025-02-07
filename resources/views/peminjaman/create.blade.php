<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h3 class="text-center">Form Peminjaman Barang</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('peminjaman.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="id_inventaris" class="form-label">Nama Barang</label>
                        <select name="id_inventaris" class="form-select">
                            <option value="" disabled selected>Pilih Barang</option>
                            @foreach ($inventaris as $item)
                                <option value="{{ $item->id_inventaris }}">{{ $item->nama_barang }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_pinjam" class="form-label">Tanggal Peminjaman</label>
                        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
                        <input type="text" name="nama_peminjam" id="nama_peminjam" class="form-control" placeholder="Masukkan Nama">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
