@extends('layout.admin.main')

@section('content')
    <h5>Kirim Pesan WA</h5>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <hr>

    <div class="card p-4">
        <div class="card p-3">
            <form action="{{ route('wa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <p>Pesan</p>
                <input type="text" class="form-control mb-3" name="pesan">
                <button class="btn btn-primary btn-sm">Kirim</button>
            </form>
        </div>
        <div class="card p-3 mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Pesan</th>
                        <th scope="col">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesan as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->pesan }}</td>
                            <td>{{ $item->created_at }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $pesan->links() }}
        </div>
    </div>
@endsection
