@extends('layout.user.main')

@section('content')
    <section>
        <div class="container">
            <h2>Galeri</h2>
            <hr>
            <div class="row">
                @foreach ($galeri as $item)
                    <div class="col-lg-4 col-md-8 mt-3">
                        <a href="{{ asset('storage/galeri/' . $item->foto) }}">
                            <div class="project">
                                <div class="overlay"></div>
                                <img src="{{ asset('storage/galeri/' . $item->foto) }}" alt="" height="250px"
                                    style="object-fit: cover">
                                <div class="content">
                                    <p class="text-white m-0">{{ $item->deskripsi }}</p>
                                    <p class="text-white m-0">{{ $item->created_at->format('d F Y') }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            {{ $galeri->links() }}
        </div>
    </section>
@endsection
