@extends('layout.admin.main')

@section('content')
    <h5>Kelola Galeri</h5>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <hr>
    <div class="card p-5">

        <div class="">
            <a href="{{ route('kelola-galeri.create') }}" class="btn btn-success btn-sm" style="font-size: 15px">Tambah
                Galeri</a>
        </div>

        <hr>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($galeri as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>
                                <a href="{{ asset('storage/galeri/' . $item->foto) }}">
                                    <img src="{{ asset('storage/galeri/' . $item->foto) }}" class="" width="120px"
                                        height="120px" style="object-fit: cover;" alt="..." />
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('kelola-galeri.edit', $item->id) }}"
                                    class="btn btn-primary btn-sm">Edit</a>

                                <form action="{{ route('kelola-galeri.destroy', $item->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
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
        {{ $galeri->links() }}
    </div>
@endsection
