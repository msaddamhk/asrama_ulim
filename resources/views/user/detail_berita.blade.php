@extends('layout.user.main')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ asset('storage/berita/' . $berita->foto) }}">
                        <img src="{{ asset('storage/berita/' . $berita->foto) }}" class="mb-3" alt="" height="500px"
                            style="object-fit: cover">
                    </a>
                    <small class="mb-3"><i class="bi bi-calendar-day me-2"></i>{{ $berita->created_at->format('d F Y') }}
                    </small>
                    <h4>{{ $berita->judul }}</h4>

                    <p>{{ $berita->deskripsi }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
