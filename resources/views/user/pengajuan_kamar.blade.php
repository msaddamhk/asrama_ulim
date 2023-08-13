@extends('layout.user.main')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h5>Pengajuan Kamar</h5>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal Masuk</th>
                                <th scope="col">Tanggal Keluar</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        @foreach ($pengajuan_kamar as $item)
                            <tbody>
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->tanggal_masuk }}</td>
                                    <td>{{ $item->tanggal_keluar }}</td>
                                    <td>{{ $item->status }}</td>
                                </tr>

                            </tbody>
                        @endforeach
                    </table>
                    {{ $pengajuan_kamar->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
