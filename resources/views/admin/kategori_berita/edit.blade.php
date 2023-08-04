@extends('layout.admin.main')

@section('content')
    <h5>Edit kategori berita</h5>

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

    <form action="{{ route('kategori-berita.update', $kategori_beritum->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="nama" class="mb-2">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $kategori_beritum->nama }}"
                required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
