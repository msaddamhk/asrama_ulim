@extends('layout.user.main')

@section('content')
    <div class="owl-carousel owl-theme hero-slider">
        <div class="slide slide1"
            style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(https://www.goodnewsfromindonesia.id/uploads/post/large-shenzen-2d5b8e99dd00db71d02af639b1f77227.jpg);background-size: cover; background-position: center; background-repeat: no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center text-white">
                        <h6 class="text-white text-uppercase">design Driven for professional</h6>
                        <h1 class="display-3 my-4">We craft digital<br />experiances</h1>
                        <a href="#" class="btn btn-brand">Get Started</a>
                        <a href="#" class="btn btn-outline-light ms-3">Our work</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide slide1"
            style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(img/bg_banner1.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-10 offset-lg-1 text-white">
                        <h6 class="text-white text-uppercase">We craft digital experiances</h6>
                        <h1 class="display-3 my-4">Design Driven For <br />Professionals</h1>
                        <a href="#" class="btn btn-brand">Get Started</a>
                        <a href="#" class="btn btn-outline-light ms-3">Our work</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section id="blog">
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
                <div class="col-md-4">
                    <article class="blog-post">
                        <img src="img/project5.jpg" alt="">
                        <a href="#" class="tag">Web Design</a>
                        <div class="content">
                            <small>01 Dec, 2022</small>
                            <h5>Web Design trends in 2022</h5>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                                piece of classical Latin literature from</p>
                        </div>
                    </article>
                </div>
                <div class="col-md-4">
                    <article class="blog-post">
                        <img src="img/project4.jpg" alt="">
                        <a href="#" class="tag">Programming</a>
                        <div class="content">
                            <small>01 Dec, 2022</small>
                            <h5>Web Design trends in 2022</h5>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                                piece of classical Latin literature from</p>
                        </div>
                    </article>
                </div>
                <div class="col-md-4">
                    <article class="blog-post">
                        <img src="img/project2.jpg" alt="">
                        <a href="#" class="tag">Marketing</a>
                        <div class="content">
                            <small>01 Dec, 2022</small>
                            <h5>Web Design trends in 2022</h5>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                                piece of classical Latin literature from</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>



    <section class="bg-light" id="team">
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
                                <img src="{{ asset('storage/kamar/' . $item->foto) }}" alt="">
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


    <section id="portfolio">
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
            <div class="project">
                <div class="overlay"></div>
                <img src="img/project1.jpg" alt="">
                <div class="content">
                    <h2>Consulting Marketing</h2>
                    <h6>Website Design</h6>
                </div>
            </div>
            <div class="project">
                <div class="overlay"></div>
                <img src="img/project2.jpg" alt="">
                <div class="content">
                    <h2>Consulting Marketing</h2>
                    <h6>Website Design</h6>
                </div>
            </div>
            <div class="project">
                <div class="overlay"></div>
                <img src="img/project3.jpg" alt="">
                <div class="content">
                    <h2>Consulting Marketing</h2>
                    <h6>Website Design</h6>
                </div>
            </div>
            <div class="project">
                <div class="overlay"></div>
                <img src="img/project4.jpg" alt="">
                <div class="content">
                    <h2>Consulting Marketing</h2>
                    <h6>Website Design</h6>
                </div>
            </div>
            <div class="project">
                <div class="overlay"></div>
                <img src="img/project5.jpg" alt="">
                <div class="content">
                    <h2>Consulting Marketing</h2>
                    <h6>Website Design</h6>
                </div>
            </div>
        </div>
    </section>
@endsection
