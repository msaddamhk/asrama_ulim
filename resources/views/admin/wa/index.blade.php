@extends('layout.admin.main')

@section('content')
    <h5>Kirim Pesan Keseluruh Anggota</h5>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <hr>

    <div class="card p-5">
        <form action="{{ route('wa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <p>Pesan</p>
            <input type="text" class="form-control mb-3" name="pesan">
            <button class="btn btn-primary btn-sm">Kirim</button>
        </form>
    </div>
@endsection
