<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" /> --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />

    <title>Halaman Admin</title>
</head>

<body>
    <div class="screen-cover d-none d-xl-none"></div>

    <div class="row">
        <div class="col-12 col-lg-3 col-navbar d-none d-xl-block">
            <aside class="sidebar">

                <button id="toggle-navbar" class="ms-auto" onclick="toggleNavbar()">
                    <i class="bi bi-x-circle"></i>
                </button>
                <div class="d-flex bg-dange">
                    <h4 class="my-auto fw-bold">Admin</h4>
                </div>

                <hr>

                <a href="{{ route('dashboard.index') }}"
                    class="sidebar-item {{ Request::is('dashboard*') ? 'active' : '' }}">
                    <i class="fa-solid fa-gauge me-2"></i>
                    <span>Dashboard</span>
                </a>

                {{-- <a href="{{ route('kategori-aset.index') }}"
                    class="sidebar-item {{ Request::is('kategori-aset*') ? 'active' : '' }}">
                    <i class="fa-solid fa-tags me-2"></i>
                    <span>Kategori Aset</span>
                </a> --}}

                <a href="{{ route('kelola-aset.index') }}"
                    class="sidebar-item {{ Request::is('kelola-aset*') ? 'active' : '' }}">
                    <i class="fa-solid fa-bed me-2"></i>
                    <span>Aset</span>
                </a>

                <a href="{{ route('kelola-ruang.index') }}"
                    class="sidebar-item {{ Request::is('kelola-ruang*') ? 'active' : '' }}">
                    <i class="fa-solid fa-door-open me-2"></i>
                    <span>Kelola Ruang</span>
                </a>

                <a href="{{ route('kelola-galeri.index') }}"
                    class="sidebar-item {{ Request::is('kelola-galeri*') ? 'active' : '' }}">
                    <i class="bi bi-file-image me-2"></i>
                    <span>Galeri</span>
                </a>

                {{-- <a href="{{ route('kategori-berita.index') }}"
                    class="sidebar-item {{ Request::is('kategori-berita*') ? 'active' : '' }}">
                    <i class="fa-solid fa-tags me-2"></i>
                    <span>Kategori Berita</span>
                </a> --}}

                <a href="{{ route('kelola-berita.index') }}"
                    class="sidebar-item {{ Request::is('kelola-berita*') ? 'active' : '' }}">
                    <i class="bi bi-newspaper me-2"></i>
                    <span>Berita</span>
                </a>

                <a href="{{ route('verifikasi.pengguna.index') }}"
                    class="sidebar-item {{ Request::is('verifikasi-pengguna*') ? 'active' : '' }}">
                    <i class="bi bi-person-check-fill me-2"></i>
                    <span>Pengguna</span>
                </a>

                <a href="{{ route('kelola-pengurus.index') }}"
                    class="sidebar-item {{ Request::is('kelola-pengurus*') ? 'active' : '' }}">
                    <i class="fa-solid fa-people-roof me-2 "></i>
                    <span>Pengurus</span>
                </a>

                <a href="{{ route('pengajuan-kamar.index') }}"
                    class="sidebar-item {{ Request::is('pengajuan-kamar*') ? 'active' : '' }}">
                    <i class="fa-solid fa-suitcase-rolling me-2"></i>
                    <span>Pengajuan Kamar</span>
                </a>

                <a href="{{ route('kelola-tanggapan.index') }}"
                    class="sidebar-item {{ Request::is('kelola-tanggapan*') ? 'active' : '' }}">
                    <i class="fa-solid fa-reply me-2"></i>
                    <span>Tanggapan</span>
                </a>

                <a href="{{ route('tamu.index') }}" class="sidebar-item {{ Request::is('tamu*') ? 'active' : '' }}">
                    <i class="fa-solid fa-users me-2"></i>
                    <span>Data Tamu</span>
                </a>

                <a href="{{ route('wa.index') }}"
                    class="sidebar-item {{ Request::is('broadcast-wa*') ? 'active' : '' }}">
                    <i class="bi bi-whatsapp me-2"></i>
                    <span>Wa Broadcast</span>
                </a>

                <a href="{{ route('kelola-admin.index') }}"
                    class="sidebar-item {{ Request::is('kelola-admin*') ? 'active' : '' }}">
                    <i class="bi bi-people me-2"></i>
                    <span>Kelola Admin</span>
                </a>

                <a class="sidebar-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-right-from-bracket me-2"></i>
                    <span>Keluar</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </aside>
        </div>

        <div class="col-12 col-xl-9">
            <div class="nav">
                <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">

                    <div class="d-flex justify-content-start align-items-center">
                        <button id="toggle-navbar" onclick="toggleNavbar()">
                            <i class="bi bi-list"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script> --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>

    @stack('scripts')

    <script>
        const navbar = document.querySelector(".col-navbar");
        const cover = document.querySelector(".screen-cover");

        const sidebar_items = document.querySelectorAll(".sidebar-item");

        function toggleNavbar() {
            navbar.classList.toggle("d-none");
            cover.classList.toggle("d-none");
        }

        function toggleActive(e) {
            sidebar_items.forEach(function(v, k) {
                v.classList.remove("active");
            });
            e.closest(".sidebar-item").classList.add("active");
        }
    </script>
</body>

</html>
