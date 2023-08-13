@extends('layout.user.main')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h5>Tanggapan</h5>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggapan</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        @foreach ($tanggapan as $item)
                            <tbody>
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->tanggapan }}</td>
                                    <td>{{ $item->status }}</td>
                                </tr>

                            </tbody>
                        @endforeach
                    </table>
                    {{ $tanggapan->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
