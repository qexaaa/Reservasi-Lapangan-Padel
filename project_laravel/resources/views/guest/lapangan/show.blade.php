<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Lapangan - Padel Arena</title>

    <!-- Bootstrap 4 -->
    <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body { padding-top: 56px; background-color: #f8f9fa; }
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
        @else
            <a href="/login" class="btn btn-outline-light mr-2">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
        @endauth
    </div>
</nav>

<div class="container py-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card shadow border-0">
                @if($lapangan->gambar)
                    <img src="{{ asset($lapangan->gambar) }}" class="card-img-top" alt="{{ $lapangan->nama_lapangan }}">
                @else
                    <div class="bg-secondary text-white text-center py-5">
                        <i class="fas fa-image fa-5x"></i>
                    </div>
                @endif
                
                <div class="card-body p-4">
                    <h2 class="font-weight-bold mb-3">{{ $lapangan->nama_lapangan }}</h2>
                    <hr>
                    <div class="mb-4">
                        <h5 class="text-muted mb-3">Deskripsi</h5>
                        <p class="lead" style="font-size: 1rem; white-space: pre-line;">
                            {{ $lapangan->deskripsi ?? 'Tidak ada deskripsi' }}
                        </p>
                    </div>

                    <div class="mb-4">
                        <h5 class="text-muted mb-2">Harga</h5>
                        <p class="h4 text-success font-weight-bold">
                            <i class="fas fa-money-bill-wave mr-2"></i>
                            Rp {{ number_format($lapangan->harga, 0, ',', '.') }} / Jam
                        </p>
                    </div>

                    <div class="alert alert-info">
                        <i class="fas fa-info-circle mr-1"></i>
                        Silahkan login terlebih dahulu untuk melakukan reservasi.
                    </div>

                    <div class="text-center mt-4">
                        @auth
                            <a href="{{ route('customer.reservasi') }}" class="btn btn-success btn-lg px-5">
                                <i class="fas fa-calendar-check mr-2"></i> Reservasi Sekarang
                            </a>
                        @else
                            <a href="/login" class="btn btn-primary btn-lg px-5">
                                <i class="fas fa-sign-in-alt mr-2"></i> Login untuk Reservasi
                            </a>
                        @endauth
                        
                        <a href="{{ route('guest.lapangan') }}" class="btn btn-secondary btn-lg ml-2">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="text-center py-4 bg-white border-top">
    © {{ date('Y') }} Padel Arena
</footer>

</body>
</html>
