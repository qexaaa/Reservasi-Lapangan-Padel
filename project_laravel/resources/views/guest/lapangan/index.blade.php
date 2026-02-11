<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Lapangan - Padel Arena</title>

    <!-- Bootstrap 4 -->
    <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body { padding-top: 56px; background-color: #f8f9fa; }
        .card-lapangan { transition: transform 0.2s; }
        .card-lapangan:hover { transform: translateY(-5px); }
        .img-lapangan { height: 200px; object-fit: cover; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand d-flex align-items-center" href="/">
        <i class="fas fa-table-tennis mr-2"></i>
        <span>Padel Arena</span>
    </a>

     <div class="navbar-nav mr-auto">
             <a class="nav-item nav-link text-light font-weight-bold" href="{{ route('guest.lapangan') }}">
                <i class="fas fa-list mr-1"></i> Lapangan
            </a>
    </div>

    <div class="ml-auto d-flex align-items-center">
        @auth
            <span class="text-light mr-3">
                <i class="fas fa-user mr-1"></i>
                {{ auth()->user()->name }}
            </span>
            <form action="/logout" method="POST" class="mb-0">
                @csrf
                <button type="submit" class="btn btn-outline-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        @else
            <a href="/login" class="btn btn-outline-light mr-2">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
        @endauth
    </div>
</nav>

<div class="container py-5">
    <h2 class="text-center mb-5 font-weight-bold">Pilihan Lapangan</h2>

    <div class="row">
        @foreach($lapangans as $l)
        <div class="col-md-4 mb-4">
            <div class="card card-lapangan shadow-sm h-100 border-0">
                <!-- GAMBAR (Placeholder jika null) -->
                @if($l->gambar)
                    <img src="{{ asset($l->gambar) }}" class="card-img-top img-lapangan" alt="{{ $l->nama_lapangan }}">
                @else
                    <div class="card-img-top img-lapangan bg-secondary d-flex align-items-center justify-content-center text-white">
                        <i class="fas fa-image fa-3x"></i>
                    </div>
                @endif

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title font-weight-bold">{{ $l->nama_lapangan }}</h5>
                    <p class="card-text text-muted">
                        {{ Str::limit($l->deskripsi, 100) }}
                    </p>
                    <div class="mt-auto">
                        <a href="{{ route('guest.lapangan.show', $l->id) }}" class="btn btn-primary btn-block">
                            <i class="fas fa-eye mr-1"></i> Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<footer class="text-center py-4 bg-white border-top">
    © {{ date('Y') }} Padel Arena
</footer>

</body>
</html>
