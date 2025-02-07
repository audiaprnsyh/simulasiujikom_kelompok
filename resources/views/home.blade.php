<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Inventaris</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script>
        // Fungsi pencarian tabel
        function searchInventaris() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");  // ambil input pencarian
            filter = input.value.toUpperCase();  // konversi pencarian ke huruf kapital
            table = document.getElementById("inventarisTable");
            tr = table.getElementsByTagName("tr");

            // Loop melalui semua baris tabel dan sembunyikan yang tidak sesuai dengan pencarian
            for (i = 1; i < tr.length; i++) {  // Mulai dari 1 karena baris pertama adalah header
                td = tr[i].getElementsByTagName("td");
                var found = false;
                // Cek apakah ada kolom yang sesuai dengan pencarian
                for (var j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            found = true;
                        }
                    }
                }
                // Tampilkan atau sembunyikan baris
                if (found) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Data Inventaris</h2>


        <!-- Input untuk pencarian -->
        <div class="mb-3">
            <input type="text" id="searchInput" onkeyup="searchInventaris()" class="form-control" placeholder="Cari data inventaris...">
        </div>

        <!-- Tampilkan jika ada pesan sukses -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Tabel Data Inventaris -->
        <table id="inventarisTable" class="table table-bordered">
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