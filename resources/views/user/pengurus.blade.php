@extends('layout.user.main')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h5>Persyaratan sebagai Pengurus</h5>
                    <p>- Minimal sudah tinggal selama 2 tahun</p>
                    <hr>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h5>Pengajuan Pengurus</h5>
                    <hr>
                    <form action="{{ route('pengurus.store') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="jabatan">Jabatan</label>
                            <select name="jabatan" class="form-control" required>
                                <option value="Sekretaris">Sekretaris</option>
                                <option value="Bendahara">Bendahara</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="proker">Program Kerja (Proker)</label>
                            <input type="text" name="proker" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
