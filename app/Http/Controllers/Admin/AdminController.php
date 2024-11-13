<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Menampilkan dashboard admin
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Menampilkan daftar pengguna
     */
    public function listUsers()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Menampilkan form untuk mengedit pengguna
     */
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Mengupdate data pengguna (nama, email, dan role)
     */
    public function updateUser(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'usertype' => 'required|in:user,admin',
        ]);

        // Cari pengguna yang akan diperbarui
        $user = User::findOrFail($id);

        // Update nama, email, dan role
        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'usertype' => $request->usertype,
        ]);

        $user->save();
        // Redirect kembali dengan pesan sukses
        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil diperbarui!');
    }
    public function destroyUser($id)
    {
        // Cari pengguna yang akan dihapus
        $user = User::findOrFail($id);

        // Hapus pengguna
        $user->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil dihapus!');
    }

    /**
     * Mengubah role pengguna
     */
}
