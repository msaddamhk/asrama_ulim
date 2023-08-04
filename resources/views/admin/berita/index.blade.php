@extends('layout.admin.main')

@section('content')
    <h5>kelola berita</h5>


    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <hr>
    <div class="card p-5">
        <div class="row">
            <div class="col-md-10">
                <form action="{{ route('kelola-berita.index') }}" method="GET">
                    <input type="text" name="cari" value="{{ request('cari') }}"
                        placeholder="Masukkan judul berita"class="form-control" />
                </form>
            </div>
            <div class="col-md-2 my-auto">
                <a href="{{ route('kelola-berita.create') }}" class="btn btn-success" style="font-size: 15px">Tambah
                    Berita</a>
            </div>
        </div>

        <hr>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($berita as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>
                                <a href="{{ asset('storage/berita/' . $item->foto) }}">
                                    <img src="{{ asset('storage/berita/' . $item->foto) }}" class="" width="120px"
                                        height="120px" style="object-fit: cover;" alt="..." />
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('kelola-berita.edit', $item) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('kelola-berita.destroy', $item) }}" method="POST"
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
                            <td colspan="6" class="text-center">Tidak Ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
