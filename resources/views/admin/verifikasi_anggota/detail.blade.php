@extends('layout.admin.main')

@section('content')
    <h5>Detail</h5>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <hr>
    <div class="card p-5 mb-5">
        <div class="d-md-flex mb-3">
            <div class="mb-lg-0 mb-3">
                <h5>Foto</h5>
                <hr>
                <a href="{{ asset('storage/foto_user/' . $verifikasi_pengguna->foto) }}">
                    <img src="{{ asset('storage/foto_user/' . $verifikasi_pengguna->foto) }}" alt="" width="200px"
                        height="200px" style="object-fit: cover">
                </a>
            </div>

            <div class="mx-lg-3">
                <h5>Foto KTP</h5>
                <hr>
                <a href="{{ asset('storage/foto_ktp/' . $verifikasi_pengguna->ktp) }}">
                    <img src="{{ asset('storage/foto_ktp/' . $verifikasi_pengguna->ktp) }}" alt="" width="200px"
                        height="200px" style="object-fit: cover">
                </a>
            </div>
        </div>

        <div class="table-responsive">

            <h5>Data</h5>
            <hr>
            <table class="table table-bordered">
                <tbody style="list-style-type: symbols(); font-size: 15px; font-weight: 100; color: rgb(51, 51, 51);">
                    <tr>
                        <td>Nama</td>
                        <td>{{ $verifikasi_pengguna->name }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{ $verifikasi_pengguna->alamat }}</td>
                    </tr>
                    <tr>
                        <td>No Hp</td>
                        <td>{{ $verifikasi_pengguna->no_hp }}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>{{ $verifikasi_pengguna->pekerjaan }}</td>
                    </tr>
                    <tr>
                        <td>Nama Bapak</td>
                        <td>{{ $verifikasi_pengguna->nama_bapak }}</td>
                    </tr>
                    <tr>
                        <td>Nama Ibu</td>
                        <td>{{ $verifikasi_pengguna->nama_ibu }}</td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>{{ $verifikasi_pengguna->tempat_lahir }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>{{ $verifikasi_pengguna->tanggal_lahir }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>{{ $verifikasi_pengguna->jenis_kelamin }}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
@endsection
