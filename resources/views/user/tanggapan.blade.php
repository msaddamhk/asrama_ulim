@extends('layout.user.main')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (auth()->user()->status == false)
                        <div class="alert alert-danger mb-3" role="alert">
                            Akun Anda Sedang di Verifikasi Admin
                        </div>
                    @endif
                    <h5>Kritik dan Saran</h5>
                    <hr>
                    <form action="{{ route('tanggapan.store') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <textarea type="text" name="tanggapan" class="form-control" rows="5" required>
                            </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary"
                            {{ auth()->user()->status ? '' : 'disabled' }}>Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
