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

        <div class="mb-lg-0 mb-3">
            <h5>Jabatan</h5>
            <p>{{ $kelola_pengurus->jabatan }}</p>
            <hr>

            <h5>Program Kerja</h5>
            <p>{{ $kelola_pengurus->program_kerja }}</p>

            <hr>
        </div>

        <div class="d-md-flex mb-3">
            <div class="mb-lg-0 mb-3">
                <h5>Foto</h5>
                <hr>
                <a href="{{ asset('storage/foto_user/' . $kelola_pengurus->user->foto) }}">
                    <img src="{{ asset('storage/foto_user/' . $kelola_pengurus->user->foto) }}" alt="" width="200px"
                        height="200px" style="object-fit: cover">
                </a>
            </div>

            <div class="mx-lg-3">
                <h5>Foto KTP</h5>
                <hr>
                <a href="{{ asset('storage/foto_ktp/' . $kelola_pengurus->user->ktp) }}">
                    <img src="{{ asset('storage/foto_ktp/' . $kelola_pengurus->user->ktp) }}" alt="" width="200px"
                        height="200px" style="object-fit: cover">
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody style="list-style-type: symbols(); font-size: 15px; font-weight: 100; color: rgb(51, 51, 51);">
                    <tr>
                        <td>Nama</td>
                        <td>{{ $kelola_pengurus->user->name }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{ $kelola_pengurus->user->alamat }}</td>
                    </tr>
                    <tr>
                        <td>No Hp</td>
                        <td>{{ $kelola_pengurus->user->no_hp }}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>{{ $kelola_pengurus->user->pekerjaan }}</td>
                    </tr>
                    <tr>
                        <td>Nama Bapak</td>
                        <td>{{ $kelola_pengurus->user->nama_bapak }}</td>
                    </tr>
                    <tr>
                        <td>Nama Ibu</td>
                        <td>{{ $kelola_pengurus->user->nama_ibu }}</td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>{{ $kelola_pengurus->user->tempat_lahir }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>{{ $kelola_pengurus->user->tanggal_lahir }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>{{ $kelola_pengurus->user->jenis_kelamin }}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
@endsection
