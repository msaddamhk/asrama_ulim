@extends('layouts.app')

@section('content')
    <div class="container" style="height: 100vh">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="alamat" class="col-form-label text-md-end">Alamat</label>
                                <div class="">
                                    <input id="alamat" type="text"
                                        class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                        value="{{ old('alamat') }}" required autocomplete="alamat">

                                    @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="no_hp" class="col-form-label text-md-end">No HP</label>
                                <div class="">
                                    <input id="no_hp" type="number"
                                        class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"
                                        value="{{ old('no_hp') }}" required autocomplete="no_hp">

                                    @error('no_hp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="pekerjaan" class="col-form-label text-md-end">Pekerjaan</label>
                                <div class="">
                                    <input id="pekerjaan" type="text"
                                        class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan"
                                        value="{{ old('pekerjaan') }}" required autocomplete="pekerjaan">

                                    @error('pekerjaan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="tempat_lahir" class="col-form-label text-md-end">Tempat lahir</label>
                                <div class="">
                                    <input id="tempat_lahir" type="text"
                                        class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir"
                                        value="{{ old('tempat_lahir') }}" required autocomplete="tempat_lahir">

                                    @error('tempat_lahir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_lahir" class="col-form-label text-md-end">Tanggal lahir</label>
                                <div class="">
                                    <input id="tanggal_lahir" type="date"
                                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                        name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required
                                        autocomplete="tanggal_lahir">

                                    @error('tanggal_lahir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="jenis_kelamin" class="col-form-label text-md-end">Jenis Kelamin</label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                            id="flexRadioDefault1" value="LAKI-LAKI">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Laki-Laki
                                        </label>
                                    </div>
                                    <div class="form-check ms-3">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                            id="flexRadioDefault2" value="PEREMPUAN">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Perempuan
                                        </label>
                                    </div>
                                    @error('jenis_kelamin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="nama_bapak" class="col-form-label text-md-end">Nama Bapak</label>
                                <div class="">
                                    <input id="nama_bapak" type="text"
                                        class="form-control @error('nama_bapak') is-invalid @enderror" name="nama_bapak"
                                        value="{{ old('nama_bapak') }}" required autocomplete="nama_bapak">

                                    @error('nama_bapak')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="nama_ibu" class="col-form-label text-md-end">Nama Ibu</label>
                                <div class="">
                                    <input id="nama_ibu" type="text"
                                        class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu"
                                        value="{{ old('nama_ibu') }}" required autocomplete="nama_ibu">

                                    @error('nama_ibu')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="foto">Foto 3x4</label>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                    id="foto" name="foto">
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="ktp">Foto ktp</label>
                                <input type="file" class="form-control @error('ktp') is-invalid @enderror"
                                    id="ktp" name="ktp">
                                @error('ktp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="password-confirm"
                                    class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="mb-0">
                                <div class="">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
