@extends('layout.admin.main')

@section('content')
    <h5>Kelola Kategori Aset</h5>


    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <hr>
    <div class="card p-5">
        <div class="row">
            <div class="col-md-10">
                <form action="{{ route('kategori-aset.index') }}" method="GET">
                    <input type="text" name="cari" value="{{ request('cari') }}"
                        placeholder="Masukkan nama kategori aset"class="form-control" />
                </form>
            </div>
            <div class="col-md-2 my-auto">
                <a href="{{ route('kategori-aset.create') }}" class="btn btn-success btn-sm" style="font-size: 15px">Tambah
                    kategori</a>
            </div>
        </div>

        <hr>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kategori_aset as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>
                                <a href="{{ route('kategori-aset.edit', $item->id) }}"
                                    class="btn btn-primary btn-sm">Edit</a>

                                <a href="{{ route('kategori-aset.nama-aset.index', $item->id) }}"
                                    class="btn btn-warning btn-sm">Kelola
                                    Nama Aset</a>

                                <form action="{{ route('kategori-aset.destroy', $item->id) }}" method="POST"
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
                            <td colspan="3" class="text-center">Tidak Ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $kategori_aset->links() }}
    </div>
@endsection
