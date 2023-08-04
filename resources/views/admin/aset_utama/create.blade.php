@extends('layout.admin.main')

@section('content')
    <h5>Tambah Aset</h5>

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

    <form action="{{ route('kelola-aset.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="nama" class="mb-2">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="merek" class="mb-2">Merek</label>
            <input type="text" class="form-control" id="merek" name="merek" value="{{ old('merek') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="kondisi" class="mb-2">Kondisi</label>
            <input type="text" class="form-control" id="kondisi" name="kondisi" value="{{ old('kondisi') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="jumlah" class="mb-2">jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="tanggal_pembelian" class="mb-2">Tanggal Pembelian</label>
            <input type="date" class="form-control" id="tanggal_pembelian" name="tanggal_pembelian"
                value="{{ old('tanggal_pembelian') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="kategori_aset">Kategori</label>
            <select class="form-select @error('kategori_aset') is-invalid @enderror" id="kategori_aset"
                name="kategori_aset">
                <option selected disabled>Choose Kategori</option>
                @foreach ($kategori_aset as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('kategori_aset') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama }}</option>
                @endforeach
            </select>
            @error('kategori_aset')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group mb-3">
            <label for="kamar">Ruangan</label>
            <select class="form-select @error('kamar') is-invalid @enderror" id="kamar" name="kamar">
                <option selected disabled>Pilih Ruangan</option>
                @foreach ($kamar as $item)
                    <option value="{{ $item->id }}" {{ old('kamar') == $item->id ? 'selected' : '' }}>
                        {{ $item->no_kamar }}</option>
                @endforeach
            </select>
            @error('kamar')
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

        <button type="submit" class="btn btn-primary mb-5">Simpan</button>
    </form>
@endsection
