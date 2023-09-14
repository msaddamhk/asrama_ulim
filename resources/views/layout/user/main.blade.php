<?php
$siteMeta = \App\Models\SiteMeta::where('key', 'pendaftaran_pengurus')->first();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('Logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title>Asrama mahasiswa Ulim</title>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">

    <div class="top-nav" id="home">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <a href="mailto:asramaulim@gmail.com" class="text-decoration-none text-white">
                        <p> <i class='bx bxs-envelope me-2'></i>asramaulim@gmail.com</p>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=6282381002993" class="text-decoration-none text-white">
                        <p> <i class='bx bxs-phone-call me-2'></i>082381002993</p>
                    </a>
                </div>
                <div class="col-auto social-icons">
                    <a href="https://instagram.com/ulimstudenasosiation?igshid=MzRlODBiNWFlZA==" target="_blank"><i
                            class='bx bxl-instagram'></i></a>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">

            <a class="navbar-brand text-white" href="/">
                <img src="{{ asset('Logo.png') }}" alt="" width="100%" height="40" />
            </a>

            <a class="text-decoration-none" href="/">Asrama Mahasiswa Ulim</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('beranda') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profil') }}">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('keasramaan') }}">Keasramaan</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Informasi
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('berita') }}">Berita</a></li>
                            @if ($siteMeta)
                                @if ($siteMeta->value == '1')
                                    <li><a class="dropdown-item" href="{{ route('pengurus.index') }}">Daftar
                                            Pengurus</a>
                                    </li>
                                @endif
                            @endif
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kamar.index') }}">Kamar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('galeri') }}">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tanggapan.index') }}">Tanggapan</a>
                    </li>

                </ul>

                @auth
                    <div class="dropdown">
                        <button class="dropdown-toggle btn-brand btn" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ auth('')->user()->name }}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('daftar-pengajuan-kamar.index') }}">Pengajuan
                                    Kamar</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('daftar-tanggapan.index') }}">Tanggapan</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Keluar
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-brand ms-lg-3">Masuk</a>
                @endauth

            </div>
        </div>
    </nav>

    @yield('content')

    <footer>
        <div class="py-5">
            <div class="container">
                <h5 class="navbar-brand">Asrama Mahasiswa Ulim<span class="dot">.</span></h5>
                <p>Beurawe, Kec. Kuta Alam, Kota Banda Aceh, Aceh 24415</p>
                <div class="card col-md-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31768.55362357057!2d95.3329874!3d5.5567608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3040370c13e739ff%3A0x66e5d28bce6df36b!2sASRAMA%20MAHASISWA%20ULIM%20PIDIE%20JAYA!5e0!3m2!1sid!2sid!4v1691926026008!5m2!1sid!2sid"
                        height="250" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <hr>
                <div class="row justify-content-between">
                    <p class="col-md-4 mb-0 text-muted">&copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        Asrama Mahasiswa Ulim
                    </p>

                    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                        <li class="ms-3">
                            <a class="text-muted"
                                href="https://instagram.com/ulimstudenasosiation?igshid=MzRlODBiNWFlZA=="
                                target="_blank">
                                <i class="bi bi-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts')
</body>

</html>
