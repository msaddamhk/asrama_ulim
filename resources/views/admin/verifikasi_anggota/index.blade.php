@extends('layout.admin.main')

@section('content')
    <h5>Verifikasi Pengguna</h5>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <hr>
    <div class="card p-5">

        <form id="verifikasi-form" action="{{ route('verifikasi.pengguna.index') }}" method="GET">

            <div class="row">
                <div class="col-md-8">
                    <input type="text" name="cari" value="{{ request('cari') }}"
                        placeholder="Masukkan nama"class="form-control " />
                </div>

                <div class="col-md-4">
                    <select name="status" class="form-select" id="status-select" aria-label="Default select example">
                        <option value="">All</option>
                        <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Belum di verifikasi
                        </option>
                        <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Sudah di verifikasi
                        </option>
                    </select>
                </div>
            </div>
        </form>

        <hr>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($verifikasi_pengguna as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>
                                <a href="{{ route('verifikasi.pengguna.detail', $item->id) }}"
                                    class="btn btn-primary btn-sm">Detail</a>
                                @if ($item->status == false)
                                    <form action="{{ route('verifikasi.pengguna.update', $item->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Verifikasi</button>
                                    </form>
                                @else
                                    <button type="submit" class="btn btn-danger btn-sm" disabled>Sudah
                                        di verifikasi</button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak Ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $verifikasi_pengguna->links() }}
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
