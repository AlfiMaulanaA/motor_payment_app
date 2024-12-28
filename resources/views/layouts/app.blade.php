<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Pembelian Motor')</title>
    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('welcome') }}">Aplikasi Pembelian Motor</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <!-- Menu untuk Admin -->
                        @if (Auth::user()->role->role_name === 'admin')
                            <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('sales.index') }}">Dashboard
                                    Penjualan</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('motors.index') }}">Motors</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('pembelis.index') }}">Pembeli</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('beli-cash.index') }}">Beli Cash</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('kredit-paket.index') }}">Kredit
                                    Paket</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('beli-kredit.index') }}">Beli Kredit</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('bayar-cicilan.index') }}">Bayar
                                    Cicilan</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('roles.index') }}">Roles</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Users</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('kontak') }}">Kontak</a></li>
                        @endif

                        <!-- Menu untuk User -->
                        @if (Auth::user()->role->role_name === 'user')
                            <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('motors.index') }}">Motors</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('beli-cash.index') }}">Beli Cash</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('kredit-paket.index') }}">Kredit
                                    Paket</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('kontak') }}">Kontak</a></li>
                        @endif

                        <!-- Logout -->
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">Logout</button>
                            </form>
                        </li>
                    @else
                        <!-- Menu untuk tamu (Guest) -->
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Tambahkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
