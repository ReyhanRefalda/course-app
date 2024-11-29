<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

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
        $users = User::with('roles')->get(); // Eager load roles untuk optimasi
        $roles = \Spatie\Permission\Models\Role::all(); // Ambil semua role yang tersedia
        return view('admin.users.index', compact('users', 'roles'));
    }
    

    /**
     * Menampilkan form untuk mengedit pengguna
     */
    public function editUser($id)
{
    $user = User::findOrFail($id);
    $roles = Role::where('name', '!=', 'Super Admin')->get(); // Hilangkan Super Admin

    return view('admin.users.edit', compact('user', 'roles'));
}

    /**
     * Mengupdate data pengguna (nama, email, dan role)
     */

     public function updateUser(UserRequest $request, $id)
     {
         $user = User::findOrFail($id);
     
         $data = $request->validated(); // Data tervalidasi dari Form Request
     
         // Update nama dan email
         $user->update([
             'nama' => $data['nama'],
             'email' => $data['email'],
         ]);
     
         // Update role pengguna
         if ($request->has('role')) {
             $user->syncRoles($data['role']);
         }
     
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
