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
                    @if (auth()->user()->status == false)
                        <div class="alert alert-danger mb-3" role="alert">
                            Akun Anda Sedang di Verifikasi Admin
                        </div>
                    @endif
                    <h5>Pengajuan Pengurus</h5>
                    <hr>
                    <form action="{{ route('pengurus.store') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="jabatan">Jabatan</label>
                            <select name="jabatan" class="form-control @error('jabatan') is-invalid @enderror"
                                v-model="jabatan" id="jabatan" required>
                                <option value="" v-if="!jabatan" selected disabled>Pilih Jabatan</option>
                                <option value="Ketua">Ketua</option>
                                <option value="Wakil Ketua">Wakil Ketua</option>
                                <option value="Sekretaris">Sekretaris</option>
                                <option value="Bendahara">Bendahara</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="proker">Program Kerja (Proker)</label>
                            <input type="text" name="proker" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary"
                            {{ auth()->user()->status ? '' : 'disabled' }}>Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
