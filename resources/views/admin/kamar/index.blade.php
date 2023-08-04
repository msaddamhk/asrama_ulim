@extends('layout.admin.main')

@section('content')
    <h5>Kelola Ruangan</h5>


    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <hr>
    <div class="card p-5">
        <div class="row">
            <div class="col-md-10">
                <form action="{{ route('kelola-ruang.index') }}" method="GET">
                    <input type="text" name="cari" value="{{ request('cari') }}"
                        placeholder="Masukkan No Ruang"class="form-control" />
                </form>
            </div>
            <div class="col-md-2 my-auto">
                <a href="{{ route('kelola-ruang.create') }}" class="btn btn-success" style="font-size: 15px">Tambah
                    Reuang</a>
            </div>
        </div>


        <hr>


        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Ruang</th>
                        <th>Lantai</th>
                        <th>Kapasitas</th>
                        <th>Luas Kamar</th>
                        <th>Status</th>
                        <th>Gambar</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kamar as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->no_kamar }}</td>
                            <td>{{ $item->lantai }}</td>
                            <td>{{ $item->kapasitas }}</td>
                            <td>{{ $item->luas_kamar }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="{{ asset('storage/kamar/' . $item->foto) }}">
                                    <img src="{{ asset('storage/kamar/' . $item->foto) }}" class="" width="120px"
                                        height="120px" style="object-fit: cover;" alt="..." />
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('kelola-ruang.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('kamar.aset.index', $item->id) }}" class="btn btn-warning">Aset</a>
                                <form action="{{ route('kelola-ruang.destroy', $item->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak Ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
