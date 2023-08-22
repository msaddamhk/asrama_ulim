@extends('layout.user.main')

@section('content')
    <section>
        <div class="container">
            <div class="d-flex justify-content-between">
                <h2>Kamar</h2>
                <form action="{{ route('kamar.index') }}" method="GET">
                    <div class="d-flex">
                        <input type="search" name="cari" value="{{ request('cari') }}" placeholder="Masukkan nama kamar"
                            class="form-control me-3" />
                        <button class="btn-brand rounded-1 border-0 px-3" type="submit"><i
                                class="bi bi-search text-white"></i></button>
                    </div>
                </form>
            </div>
            <hr>
            <div class="row">
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
            {{ $kamar->links() }}
        </div>
    </section>
@endsection
