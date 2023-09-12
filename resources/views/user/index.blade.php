@extends('layout.user.main')

@section('content')
    <div class="owl-carousel owl-theme hero-slider">
        <div class="slide slide1"
            style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(https://lh5.googleusercontent.com/p/AF1QipOeXNtIQDl1Rp3fPLwiqNDEjaCd09AMvjTDvrLz=w1920-h1080-k-no);background-size: cover; background-position: center; background-repeat: no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center text-white">
                        <h1 class="display-3 my-4">Asrama Mahasiswa<br />Ulim Pidie Jaya</h1>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="slide slide1"
            style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(img/bg_banner1.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-10 offset-lg-1 text-white">
                        <h1 class="display-3 my-4">Asrama Mahasiswa<br />Ulim Pidie Jaya</h1>
                        <a href="#" class="btn btn-brand">Get Started</a>
                        <a href="#" class="btn btn-outline-light ms-3">Our work</a>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        <h1>Berita</h1>
                        <p class="mx-auto">Informasi seputar asrama Mahasiswa Kecamatan Ulim</p>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach ($berita as $item)
                    <div class="col-md-4">
                        <a href="{{ route('detail-berita', [$item]) }}">
                            <div class="card">
                                <img src="{{ asset('storage/berita/' . $item->foto) }}" alt="" height="250px"
                                    style="object-fit: cover">
                                <a href="{{ route('berita-kategori.index', [$item->kategoriBerita->id]) }}"
                                    class="label-top bg-dark text-decoration-none">{{ $item->kategoriBerita->nama }}</a>
                                <div class="card-body">
                                    <small>{{ $item->created_at->format('d F Y') }}
                                    </small>
                                    <h5>{{ $item->judul }}</h5>
                                    <p>{{ implode(' ', array_slice(str_word_count(strip_tags($item->deskripsi), 2), 0, 20)) }}...
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        <h1>Kamar</h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">

                @foreach ($kamar as $item)
                    <div class="col-lg-4 col-md-8">
                        <a href="{{ route('detail-kamar', [$item]) }}">
                            <div class="project">
                                <div class="overlay"></div>
                                <img src="{{ asset('storage/kamar/' . $item->foto) }}" alt="" height="350px"
                                    style="object-fit: cover">
                                <div class="content">
                                    <h3 class="text-white">{{ $item->no_kamar }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        <h1>Galeri</h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="projects-slider" class="owl-theme owl-carousel">

            @foreach ($galeri as $item)
                <div class="project">
                    <a href="{{ asset('storage/galeri/' . $item->foto) }}">
                        <div class="overlay"></div>
                        <img src="{{ asset('storage/galeri/' . $item->foto) }}" alt="" height="400px"
                            style="object-fit: cover">
                        <div class="content">
                            <p class="text-white m-0">{{ $item->deskripsi }}</p>
                            <p class="text-white m-0">{{ $item->created_at->format('d F Y') }}
                            </p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
@endsection
