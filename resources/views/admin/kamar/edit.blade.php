@extends('layout.admin.main')

@section('content')
    <h5>Edit Ruang</h5>

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

    <form action="{{ route('kelola-ruang.update', $kamar->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="no_kamar" class="mb-2">Nama</label>
            <input type="text" class="form-control" id="nama" name="no_kamar" value="{{ $kamar->no_kamar }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="kapasitas" class="mb-2">Kapasitas</label>
            <input type="text" class="form-control" id="kapasitas" name="kapasitas" value="{{ $kamar->kapasitas }}"
                required>
        </div>

        <div class="form-group mb-3">
            <label for="lantai" class="mb-2">Lantai</label>
            <input type="text" class="form-control" id="lantai" name="lantai" value="{{ $kamar->lantai }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="luas_kamar" class="mb-2">Luas</label>
            <input type="text" class="form-control" id="luas_kamar" name="luas_kamar" value="{{ $kamar->luas_kamar }}"
                required>
        </div>

        <div class="form-group mb-3">
            <label for="status">Status</label>
            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">

                <option selected disabled>Pilih Status</option>

                <option value="1" {{ $kamar->status == '1' ? 'selected' : '' }}>
                    Tersedia
                </option>

                <option value="0" {{ $kamar->status == '0' ? 'selected' : '' }}>
                    Tidak Tersedia
                </option>

            </select>
            @error('status')
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
