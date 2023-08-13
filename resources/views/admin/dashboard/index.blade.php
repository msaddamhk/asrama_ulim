@extends('layout.admin.main')

@section('content')
    <h5>Dashboard</h5>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <hr>

    <div class="card p-lg-5 p-3">

        <form action="{{ route('pendaftaran-pengurus.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <p class="form-check-label m-0" for="value">Pendaftaran Pengurus</p>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="value" value="1"
                        name="value" onchange="this.form.submit()" {{ $siteMetaValue === '1' ? 'checked' : '' }}>
                </div>
            </div>
        </form>

        <hr>

        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card p-3">
                    <h6 class="fw-bold">Total Berita</h6>
                    <h6>{{ $totalberita }} Item</h6>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card p-3">
                    <h6 class="fw-bold">Total Foto Galeri</h6>
                    <h6>{{ $totalgaleri }} Item</h6>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card p-3">
                    <h6 class="fw-bold">Total Aset</h6>
                    <h6>{{ $totalaset }} Item</h6>
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <div class="card p-3">
                    <h6 class="fw-bold">Total Ruangan</h6>
                    <h6>{{ $totalruang }} Ruangan</h6>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card p-3">
                    <h6 class="fw-bold">Total Kategori Aset</h6>
                    <h6>{{ $totalkategoriaset }} Item</h6>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card p-3">
                    <h6 class="fw-bold">Total Pengurus Aktif</h6>
                    <h6>{{ $totalpengurus }} Orang</h6>
                </div>
            </div>

        </div>
    </div>
@endsection
