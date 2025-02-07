<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Inventaris</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .highlight {
            background-color: yellow;
            font-weight: bold;
        }
    </style>
    <script>
        function searchInventaris() {
            var input, filter, table, tr, td, i, txtValue, selectedColumn;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("inventarisTable");
            tr = table.getElementsByTagName("tr");
            selectedColumn = document.getElementById("searchColumn").value; // Ambil kolom yang dipilih

            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td");
                var found = false;

                for (var j = 0; j < td.length; j++) {
                    if (selectedColumn === "all" || j == selectedColumn) {
                        if (td[j]) {
                            txtValue = td[j].textContent || td[j].innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                found = true;
                                highlightText(td[j], filter);
                            } else {
                                removeHighlight(td[j]);
                            }
                        }
                    }
                }
                tr[i].style.display = found ? "" : "none";
            }
        }

        function highlightText(element, keyword) {
            var text = element.textContent || element.innerText;
            var regex = new RegExp(`(${keyword})`, "gi");
            element.innerHTML = text.replace(regex, "<span class='highlight'>$1</span>");
        }

        function removeHighlight(element) {
            element.innerHTML = element.textContent || element.innerText;
        }

        function resetSearch() {
            document.getElementById("searchInput").value = "";
            searchInventaris();
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Data Inventaris</h2>

        <div class="row mb-3">
            <div class="col-md-4">
                <input type="text" id="searchInput" onkeyup="searchInventaris()" class="form-control" placeholder="Cari data inventaris...">
            </div>
            <div class="col-md-3">
                <select id="searchColumn" class="form-select" onchange="searchInventaris()">
            
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-secondary" onclick="resetSearch()">Reset</button>
            </div>
            <div class="col-md-3 text-end">
                <a href="/peminjaman/create" class="btn btn-primary">Tambah Peminjaman</a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table id="inventarisTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Inventaris</th>
                    <th>Nama Barang</th>
                    <th>Kondisi</th>
                    <th>Stok</th>
                    <th>Tanggal Register</th>
                   
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
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
