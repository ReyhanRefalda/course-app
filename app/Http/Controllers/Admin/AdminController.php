<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
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

    public function updateUser(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validated(); // Data tervalidasi dari Form Request

        $user->update($data);

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
