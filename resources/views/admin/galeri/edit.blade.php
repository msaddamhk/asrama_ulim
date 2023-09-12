@extends('layout.admin.main')

@section('content')
    <h5>Edit galeri</h5>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <hr>

    <form action="{{ route('kelola-galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="deskripsi" class="mb-2">Deskripsi Gambar</label>
            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi"
                value="{{ $galeri->deskripsi }}" required>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="foto">Foto</label>
            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
            @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
