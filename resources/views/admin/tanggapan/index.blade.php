@extends('layout.admin.main')

@section('content')
    <h5>Kelola Tanggapan</h5>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <hr>
    <div class="card p-5">

        <form id="verifikasi-form" action="{{ route('kelola-tanggapan.index') }}" method="GET">
            <select name="status" class="form-select" id="status-select" aria-label="Default select example">
                <option value="">All</option>
                <option value="BELUM DI TIDAK LANJUTI"
                    {{ request('status') === 'BELUM DI TIDAK LANJUTI' ? 'selected' : '' }}>Belum di
                    tindak lanjuti
                </option>
                <option value="SEDANG DI TINDAK LANJUTI"
                    {{ request('status') === 'SEDANG DI TINDAK LANJUTI' ? 'selected' : '' }}>Sudah di
                    tindak lanjuti
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
                        <th>Tanggapan</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tanggapan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->tanggapan }}</td>
                            <td>
                                @if ($item->status == 'BELUM DI TIDAK LANJUTI')
                                    <form action="{{ route('kelola-tanggapan.update', $item->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">SEDANG DI TINDAK
                                            LANJUTI</button>
                                    </form>
                                @else
                                    <button type="submit" class="btn btn-success btn-sm" disabled>SEDANG DI TINDAK
                                        LANJUTI</button>
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
        {{ $tanggapan->links() }}
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
