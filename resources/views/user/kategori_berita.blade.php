@extends('layout.user.main')

@section('content')
    <section>
        <div class="container">
            <div class="d-flex justify-content-between">
                <h2>Berita</h2>
                <form action="{{ route('berita-kategori.index', $berita_kategori) }}" method="GET">
                    <div class="d-flex">
                        <input type="search" name="cari" value="{{ request('cari') }}"
                            placeholder="Masukkan judul berita"class="form-control me-3" />
                        <button class="btn-brand rounded-1 border-0 px-3" type="submit"><i
                                class="bi bi-search text-white"></i></button>
                    </div>
                </form>
            </div>
            <hr>
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
            {{ $berita->links() }}
        </div>
    </section>
@endsection
