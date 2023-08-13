@extends('layout.user.main')

@section('content')
    <section>
        <div class="container">
            @if (auth()->check() && auth()->user()->status == false)
                <div class="alert alert-danger mb-3" role="alert">
                    Akun Anda Sedang di Verifikasi Admin
                </div>
            @endif


            <div class="row">
                <div class="col-md-7">
                    <a href="{{ asset('storage/kamar/' . $kamar->foto) }}">
                        <img src="{{ asset('storage/kamar/' . $kamar->foto) }}" alt="" height="500px"
                            style="object-fit: cover">
                    </a>
                </div>
                <div class="col-md-5 mt-5 mt-lg-0">
                    <div class="card p-4">
                        <h3>{{ $kamar->no_kamar }}</h3>
                        <table class="table table-bordered">
                            <tbody
                                style="list-style-type: symbols(); font-size: 15px; font-weight: 100; color: rgb(51, 51, 51);">
                                <tr>
                                    <td>kapasitas</td>
                                    <td>{{ $kamar->kapasitas }}</td>
                                </tr>
                                <tr>
                                    <td>Lantai</td>
                                    <td>{{ $kamar->lantai }}</td>
                                </tr>
                                <tr>
                                    <td>Luas Kamar</td>
                                    <td>{{ $kamar->luas_kamar }}</td>
                                </tr>
                                <tr>
                                    <td>Fasilitas</td>
                                    <td>
                                        @foreach ($kamar->aset as $item)
                                            <p class="m-0"> - {{ $item->nama }} ({{ $item->jumlah }})</p>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <p class="m-0">Ajukan Kamar</p>
                        <hr>
                        <form method="POST" action="{{ route('ajukan-kamar.store') }}">
                            @csrf
                            <input type="hidden" class="form-control" id="tanggal_reservasi" name="kamar"
                                value="{{ $kamar->id }}">
                            <div class="mb-3">
                                <label for="tanggal_reservasi" class="form-label">Tanggal Masuk</label>
                                <input type="date" class="form-control" id="tanggal_reservasi" name="tanggal_masuk"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_keluar" class="form-label">Tanggal Keluar</label>
                                <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar"
                                    required>
                            </div>

                            @if (auth()->check())
                                <button type="submit" class="btn btn-primary"
                                    {{ auth()->user()->status ? '' : 'disabled' }}>Submit</button>
                            @else
                                <button type="submit" class="btn btn-primary">Submit</button>
                            @endif
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
