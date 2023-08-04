@extends('layout.admin.main')

@section('content')
    <h5>Tambah data tamu</h5>

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

    <form action="{{ route('tamu.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="nama" class="mb-2">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="no_hp" class="mb-2">No HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="alamat" class="mb-2">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" required>
        </div>

        <div class="mb-3">
            <label for="jenis_kelamin" class="col-form-label text-md-end">Jenis Kelamin</label>
            <div class="d-flex">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault1"
                        value="LAKI-LAKI">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Laki-Laki
                    </label>
                </div>
                <div class="form-check ms-3">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault2"
                        value="PEREMPUAN">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Perempuan
                    </label>
                </div>
                @error('jenis_kelamin')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="tanggal_masuk" class="mb-2">Tanggal Masuk</label>
            <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk"
                value="{{ old('tanggal_masuk') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="tanggal_keluar" class="mb-2">Tanggal Keluar</label>
            <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar"
                value="{{ old('tanggal_keluar') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="keperluan" class="mb-2">keperluan</label>
            <input type="text" class="form-control" id="keperluan" name="keperluan" value="{{ old('keperluan') }}"
                required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
