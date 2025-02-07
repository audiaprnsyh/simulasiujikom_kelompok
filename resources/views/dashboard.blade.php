<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
        <h2 class="mt-5">Selamat Datang, {{ Auth::user()->name }}</h2>
        <p>Ini adalah dashboard admin. Anda dapat mengelola proyek, pengguna, dan melakukan pengaturan lainnya melalui sidebar di sebelah kiri.</p>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
