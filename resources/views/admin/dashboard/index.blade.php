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

        <div class="card p-3">
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
        </div>

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

        <div class="col-md-5">
            <div class="card p-3">
                <h6 class="fw-bold">Struktur Pengurus</h6>
                <form action="{{ route('kelola-struktur-pengurus.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input id="foto" type="file"
                        class="d-none form-control-file @error('foto') is-invalid @enderror" name="foto"
                        onchange="previewImage()">

                    <label for="foto">
                        <div class="card p-2 mt-2">
                            @if ($siteMeta2 == null)
                                <img id="frame" style="object-fit:cover" width="400px"
                                    src="{{ asset('upload-image.png') }}" class="img-fluid">
                            @else
                                <img id="frame" style="object-fit:cover" width="400px"
                                    src="{{ asset('storage/struktur_pengurus/' . $siteMeta2->value) }}" class="img-fluid">
                            @endif

                            <button class="btn btn-primary mt-2">Submit</button>
                            @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </label>
                </form>
            </div>

        </div>
    </div>

    <script>
        function previewImage() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
