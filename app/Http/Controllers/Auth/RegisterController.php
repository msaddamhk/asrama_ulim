<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'nama_bapak' => ['required', 'string', 'max:255'],
            'nama_ibu' => ['required', 'string', 'max:255'],
            'pekerjaan' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required'],
            'jenis_kelamin' => ['required'],
            'no_hp' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'foto' => ['required', 'mimes:jpeg,png,jpg', 'image', 'max:2048'],
            'ktp' => ['required', 'mimes:jpeg,png,jpg', 'image', 'max:2048'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if ($data['foto']) {
            $data['foto']->storeAs('public/foto_user', $data['foto']->getClientOriginalName());
        }

        if ($data['ktp']) {
            $data['ktp']->storeAs('public/foto_ktp', $data['ktp']->getClientOriginalName());
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'alamat' => $data['alamat'],
            'pekerjaan' => $data['pekerjaan'],
            'nama_ibu' => $data['nama_ibu'],
            'no_hp' => $data['no_hp'],
            'nama_bapak' => $data['nama_bapak'],
            'foto' => $data['foto'] ? $data['foto']->getClientOriginalName() : null,
            'ktp' => $data['ktp'] ? $data['ktp']->getClientOriginalName() : null,
            'tanggal_lahir' => $data['tanggal_lahir'],
            'tempat_lahir' => $data['tempat_lahir'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
