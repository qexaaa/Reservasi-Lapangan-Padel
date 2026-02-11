    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>Reservasi Lapangan Padel</title>

        <!-- Bootstrap 4 -->
        <link rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- Font Awesome -->
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

        <!-- Custom CSS (HARUS PALING BAWAH) -->
        <link rel="stylesheet"
            href="{{ asset('css/landing.css') }}">

    </head>
    <body style="padding-top:56px">

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
        <a href="/register" class="btn btn-light">
            <i class="fas fa-user-plus"></i> Register
        </a>
    @endauth

</div>
    </nav>

    <!-- HERO SECTION -->
    <section class="hero">
        <div class="hero-content pt-5">
            <h1 class="display-4 font-weight-bold">
                Main Padel Lebih Mudah
            </h1>
            <p class="lead">
                Pesan lapangan padel favoritmu kapan saja tanpa ribet.
            </p>

            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-lg mt-3 mr-2">
                        Reservasi Sekarang
                    </a>
                @else
                    <a href="{{ route('customer.dashboard') }}" class="btn btn-primary btn-lg mt-3 mr-2">
                        Reservasi Sekarang
                    </a>
                @endif
            @else
                <a href="/login" class="btn btn-primary btn-lg mt-3 mr-2">
                    Reservasi Sekarang
                </a>
            @endauth

            <a href="/register" class="btn btn-success btn-lg mt-3">
                Daftar Member
            </a>
        </div>
    </section>


    <!-- FITUR -->
    <section class="container text-center my-5">
        <div class="row">
            <div class="col-md-4">
                <i class="fa-solid fa-calendar-check fa-3x text-primary mb-3"></i>
                <h4>Jadwal Fleksibel</h4>
                <p>Pilih jadwal bermain sesuai waktu luangmu.</p>
            </div>
            <div class="col-md-4">
                <i class="fa-solid fa-credit-card fa-3x text-success mb-3"></i>
                <h4>Pembayaran Mudah</h4>
                <p>Upload bukti pembayaran langsung dari akunmu.</p>
            </div>
            <div class="col-md-4">
                <i class="fa-solid fa-chart-line fa-3x text-warning mb-3"></i>
                <h4>Terorganisir</h4>
                <p>Status reservasi dan jadwal tercatat rapi.</p>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="bg-dark text-white text-center p-5">
        @auth
            <h3>Siap Bermain Hari Ini, {{ auth()->user()->name }}?</h3>
            <p>Segera pesan lapangan favoritmu.</p>
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-light btn-lg">
                    Ke Dashboard
                </a>
            @else
                <a href="{{ route('customer.dashboard') }}" class="btn btn-outline-light btn-lg">
                    Mulai Reservasi
                </a>
            @endif
        @else
            <h3>Siap Bermain Hari Ini?</h3>
            <p>Login sekarang dan pesan lapangan favoritmu.</p>
            <a href="/login" class="btn btn-outline-light btn-lg">
                Mulai Sekarang
            </a>
        @endauth
    </section>

    <footer class="text-center mt-4 mb-3 text-muted">
        © {{ date('Y') }} Padel Arena
    </footer>

    </body>
    </html>
