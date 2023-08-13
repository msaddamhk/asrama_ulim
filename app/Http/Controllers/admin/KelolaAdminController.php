<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class KelolaAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('rule', 'ADMIN')->where('name', 'like', '%' . request('cari') . '%')->latest()->paginate(15);
        return view('admin.kelola_admin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kelola_admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
        ]);

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "no_hp" => $request->no_hp,
            "rule" => "ADMIN",
            "alamat" => "Banda Aceh",
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('kelola-admin.index')->with('success', 'Data Berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $kelola_admin)
    {
        return view('admin.kelola_admin.edit', compact('kelola_admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $kelola_admin)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $kelola_admin->id,
            'password' => 'nullable|min:8',
        ]);

        $kelola_admin->name = $request->name;
        $kelola_admin->email = $request->email;
        $kelola_admin->no_hp = $request->no_hp;

        if (!empty($request->password)) {
            $kelola_admin->password = bcrypt($request->password);
        }

        $kelola_admin->save();
        return redirect()->route('kelola-admin.index')->with('success', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $kelola_admin)
    {
        $kelola_admin->delete();
        return redirect()->route('kelola-admin.index')->with('success', 'Data Berhasil di Hapus');
    }
}
