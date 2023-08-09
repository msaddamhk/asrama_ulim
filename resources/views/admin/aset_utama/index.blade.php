@extends('layout.admin.main')

@section('content')
    <h5>Kelola Aset</h5>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <hr>
    <div class="card p-5">
        <div class="row">
            <div class="col-md-10">
                <form action="{{ route('kelola-aset.index') }}" method="GET">
                    <input type="text" name="cari" value="{{ request('cari') }}"
                        placeholder="Masukkan Nama aset"class="form-control" />
                </form>
            </div>
            <div class="col-md-2 my-auto">
                <a href="{{ route('kelola-aset.create') }}" class="btn btn-success btn-sm" style="font-size: 15px">Tambah
                    Aset</a>
            </div>
        </div>

        <hr>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Ruangan</th>
                        <th>No Aset</th>
                        <th>Merek</th>
                        <th>Kondisi</th>
                        <th>Jumlah</th>
                        <th>Tanggal Pembelian</th>
                        <th>Gambar</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($aset as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->kamar->no_kamar }}</td>
                            <td>{{ $item->no_aset }}</td>
                            <td>{{ $item->merek }}</td>
                            <td>{{ $item->kondisi }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->tanggal_pembelian }}</td>
                            <td>
                                <a href="{{ asset('storage/aset/' . $item->foto) }}">
                                    <img src="{{ asset('storage/aset/' . $item->foto) }}" class="" width="120px"
                                        height="120px" style="object-fit: cover;" alt="..." />
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('kelola-aset.edit', [$item]) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('kelola-aset.destroy', [$item]) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Delete</button>
                                </form>
                                <a class="btn btn-warning btn-sm" href="{{ route('no_aset.index', $item) }}">Download
                                    No Aset</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Tidak Ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $aset->links() }}
    </div>
@endsection
