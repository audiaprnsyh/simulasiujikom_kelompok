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
        <a href="{{ route('peminjaman.index') }}" class="nav-link">Kelola Peminjaman</a>
    </li>

    <li class="nav-item">
        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>