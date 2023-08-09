@extends('layout.admin.main')

@section('content')
    <h5>Pengajuan Kamar</h5>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <hr>
    <div class="card p-5">

        <form id="verifikasi-form" action="{{ route('pengajuan-kamar.index') }}" method="GET">
            <select name="status" class="form-select" id="status-select" aria-label="Default select example">
                <option value="">All</option>
                <option value="BELUM DI VERIFIKASI" {{ request('status') === 'BELUM DI VERIFIKASI' ? 'selected' : '' }}>
                    Belum di
                    verifikasi
                </option>
                <option value="AKTIF" {{ request('status') === 'AKTIF' ? 'selected' : '' }}>Aktif
                </option>
                <option value="SELESAI" {{ request('status') === 'SELESAI' ? 'selected' : '' }}>Selesai
                </option>
                <option value="DI TOLAK" {{ request('status') === 'DI TOLAK' ? 'selected' : '' }}>Di tolak
                </option>
            </select>
        </form>

        <hr>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nama Kamar</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pengajuan_kamar as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->kamar->no_kamar }}</td>
                            <td>{{ $item->tanggal_masuk }}</td>
                            <td>{{ $item->tanggal_keluar }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="{{ route('pengajuan-kamar.detail', $item->id) }}"
                                    class="btn btn-secondary btn-sm">Detail</a>
                                @if ($item->status == 'BELUM DI VERIFIKASI')
                                    <form action="{{ route('pengajuan-kamar.update_aktif', $item->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin mengupdate status menjadi aktif?')">Verifikasi</button>
                                    </form>

                                    <form action="{{ route('pengajuan-kamar.update_tolak', $item->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin mengupdate status menjadi di tolak?')">Tolak</button>
                                    </form>
                                @elseif ($item->status == 'AKTIF')
                                    <form action="{{ route('pengajuan-kamar.update_selesai', $item->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        <button class="btn btn-success btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin mengupdate status menjadi selesai?')">Update
                                            Selesai</button>
                                    </form>
                                @elseif ($item->status == 'DI TOLAK')
                                    <button class="btn btn-warning btn-sm" disabled>Ditolak</button>
                                @elseif ($item->status == 'SELESAI')
                                    <button class="btn btn-success btn-sm" disabled>Update Selesai</button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak Ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $pengajuan_kamar->links() }}
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("verifikasi-form");
            const statusSelect = document.getElementById("status-select");

            statusSelect.addEventListener("change", function() {
                form.submit();
            });
        });
    </script>
@endsection
