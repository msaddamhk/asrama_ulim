@extends('layout.admin.main')

@section('content')
    <h5>Edit Berita </h5>

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

    <form action="{{ route('kelola-berita.update', $berita) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="deskripsi" class="mb-2">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $berita->judul }}" required>
        </div>


        <div class="form-group mb-3">
            <label for="kategori_berita">Kategori</label>
            <select class="form-select @error('kategori_berita') is-invalid @enderror" id="kategori_berita"
                name="kategori_berita">
                <option selected disabled>Choose Kategori</option>
                @foreach ($kategori_berita as $kategori)
                    <option value="{{ $kategori->id }}"
                        {{ $berita->kategori_berita_id == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama }}</option>
                @endforeach
            </select>
            @error('kategori_berita')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="deskripsi" class="mb-2">Deskripsi</label>
            <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                {{ $berita->deskripsi }}
            </textarea>
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
