@extends('layout.admin.main')

@section('content')
    <h5>Edit Aset </h5>

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

    <form action="{{ route('kamar.aset.update', [$kamar, $aset]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="kategori_aset">Kategori</label>
            <select class="form-select @error('kategori_aset') is-invalid @enderror" id="kategori_aset" name="kategori_aset">
                <option selected disabled>Choose Kategori</option>
                @foreach ($kategori_aset as $kategori)
                    <option value="{{ $kategori->id }}" {{ $aset->kategori_aset_id == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama }}</option>
                @endforeach
            </select>
            @error('kategori_aset')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="nama" class="mb-2">Nama Aset</label>
            <select class="form-select @error('nama') is-invalid @enderror" id="nama" name="nama"
                v-model="nama"required>
                <option value="" v-if="!nama">Pilih Nama Aset</option>
                <option value="Meja" {{ $aset->nama == 'Meja' ? 'selected' : '' }}>Meja</option>
                <option value="Kursi" {{ $aset->nama == 'Kursi' ? 'selected' : '' }}>Kursi</option>
                <option value="Lemari" {{ $aset->nama == 'Lemari' ? 'selected' : '' }}>Lemari</option>
                <option value="Tempat Tidur" {{ $aset->nama == 'Tempat Tidur' ? 'selected' : '' }}>Tempat Tidur</option>
                <option value="AC" {{ $aset->nama == 'AC' ? 'selected' : '' }}>AC</option>
                <option value="Kipas Angin" {{ $aset->nama == 'Kipas Angin' ? 'selected' : '' }}>Kipas Angin</option>
                <option value="Mesin Air" {{ $aset->nama == 'Mesin Air' ? 'selected' : '' }}>Mesin Air</option>
                <option value="Komputer" {{ $aset->nama == 'Komputer' ? 'selected' : '' }}>Komputer</option>
                <option value="Laptop" {{ $aset->nama == 'Laptop' ? 'selected' : '' }}>Laptop</option>
                <option value="Sapu" {{ $aset->nama == 'Sapu' ? 'selected' : '' }}>Sapu</option>
                <option value="Kain Pel Lantai" {{ $aset->nama == 'Kain Pel Lantai' ? 'selected' : '' }}>Kain Pel
                    Lantai
                </option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="merek" class="mb-2">Merek</label>
            <input type="text" class="form-control" id="merek" name="merek" value="{{ $aset->merek }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="kondisi" class="mb-2">Kondisi</label>
            <select class="form-select @error('kondisi') is-invalid @enderror" id="kondisi" name="kondisi"
                v-model="kondisi" required>
                <option value="" v-if="!kondisi">Pilih Kondisi</option>
                <option value="Baik" {{ $aset->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
                <option value="Rusak" {{ $aset->kondisi == 'Rusak' ? 'selected' : '' }}>Rusak</option>
            </select>
        </div>
        <input type="hidden" class="form-control" id="jumlah" name="jumlah" value="1">

        <div class="form-group mb-3">
            <label for="tanggal_pembelian" class="mb-2">Tanggal Pembelian</label>
            <input type="date" class="form-control" id="tanggal_pembelian" name="tanggal_pembelian"
                value="{{ $aset->tanggal_pembelian }}" required>
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
