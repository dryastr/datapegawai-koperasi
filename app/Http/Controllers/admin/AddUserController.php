<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AddUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role_id', 2)->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jabatans = Jabatan::all();
        return view('admin.users.create', compact('jabatans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'nullable|string|min:8',
            'alamat' => 'nullable|string|max:255',
            'jabatan_id' => 'nullable|exists:jabatans,id',
            'tgl_mcu' => 'nullable|date',
            'induksi' => 'nullable|date',
            'tgl_masuk' => 'nullable|date',
            'tgl_keluar' => 'nullable|date',
            'no_hp' => 'nullable|string|max:15',
            'keterangan' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->alamat = $request->alamat;
        $user->jabatan_id = $request->jabatan_id;
        $user->tgl_mcu = $request->tgl_mcu;
        $user->induksi = $request->induksi;
        $user->tgl_masuk = $request->tgl_masuk;
        $user->tgl_keluar = $request->tgl_keluar;
        $user->no_hp = $request->no_hp;
        $user->keterangan = $request->keterangan;
        $user->role_id = 2;
        $user->save();

        return redirect()->route('admin.addusers.index')->with('success', 'Pengguna berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $jabatans = Jabatan::all();
        return view('admin.users.edit', compact('user', 'jabatans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'alamat' => 'nullable|string|max:255',
            'jabatan_id' => 'nullable|exists:jabatans,id',
            'tgl_mcu' => 'nullable|date',
            'induksi' => 'nullable|date',
            'tgl_masuk' => 'nullable|date',
            'tgl_keluar' => 'nullable|date',
            'no_hp' => 'nullable|string|max:15',
            'keterangan' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->alamat = $request->alamat;
        $user->jabatan_id = $request->jabatan_id;
        $user->tgl_mcu = $request->tgl_mcu;
        $user->induksi = $request->induksi;
        $user->tgl_masuk = $request->tgl_masuk;
        $user->tgl_keluar = $request->tgl_keluar;
        $user->no_hp = $request->no_hp;
        $user->keterangan = $request->keterangan;
        $user->save();

        return redirect()->route('admin.addusers.index')->with('success', 'Pengguna berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.addusers.index')->with('success', 'Pengguna berhasil dihapus');
    }
}
