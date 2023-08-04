<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" /> --}}

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

                <div class="">
                    <h3>Admin</h3>
                </div>

                <button id="toggle-navbar" onclick="toggleNavbar()">
                    <img src="./assets/img/global/navbar-times.svg" alt="" />
                </button>

                <hr>

                <a href="#" class="sidebar-item">
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('kategori-aset.index') }}" class="sidebar-item">
                    <span>Kategori Aset</span>
                </a>

                <a href="{{ route('kelola-aset.index') }}" class="sidebar-item">
                    <span>Aset</span>
                </a>

                <a href="{{ route('kelola-ruang.index') }}" class="sidebar-item">
                    <span>Kelola Ruang</span>
                </a>

                <a href="{{ route('kelola-galeri.index') }}" class="sidebar-item">
                    <span>Galeri</span>
                </a>

                <a href="{{ route('kategori-berita.index') }}" class="sidebar-item">
                    <span>Kategori Berita</span>
                </a>

                <a href="{{ route('kelola-berita.index') }}" class="sidebar-item">
                    <span>Berita</span>
                </a>

                <a href="{{ route('verifikasi.pengguna.index') }}" class="sidebar-item">
                    <span>Pengguna</span>
                </a>

                <a href="#" class="sidebar-item">
                    <span>Pengurus</span>
                </a>

                <a href="#" class="sidebar-item">
                    <span>Pesanan Kamar</span>
                </a>

                <a href="{{ route('tamu.index') }}" class="sidebar-item">
                    <span>Data Tamu</span>
                </a>

                <a href="#" class="sidebar-item">
                    <span>Logout</span>
                </a>
            </aside>
        </div>

        <div class="col-12 col-xl-9">
            <div class="nav">
                <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
                    <div class="d-flex justify-content-start align-items-center">
                        <button id="toggle-navbar" onclick="toggleNavbar()">
                            tekan
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
