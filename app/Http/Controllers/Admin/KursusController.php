<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KursusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $search = $request->search;
        $kursus = Kursus::all();
        return view('admin.kursus.index', compact('kursus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kursus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric|min:0', 
        ], [
            'judul.required' => 'Judul wajib diisi',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'harga.required' => 'Harga wajib diisi',
            'harga.numeric' => 'Harga harus berupa angka',
            'harga.min' => 'Harga tidak boleh kurang dari 0',
        ]);

        $data = [
            'judul'=> $request->judul,
            'deskripsi'=> $request->deskripsi,
            'harga'=> $request->harga
        ];

        Kursus::create($data);

        return redirect()->route('admin.kursus.index')->with('success', 'Kursus berhasil diupdate!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kursus $kursus)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kursus = Kursus::findOrFail($id);
        return view('admin.kursus.edit', compact('kursus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kursus = Kursus::findOrFail($id);

        $validatedData = $request->validate([
            'judul' => 'required|string|max:255', 
            'deskripsi' => 'required|string', 
            'harga' => 'required|numeric|min:0', 
        ], [
            'judul.required' => 'Judul wajib diisi',
            'judul.string' => 'Judul harus berupa teks',
            'judul.max' => 'Judul tidak boleh lebih dari 255 karakter',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'deskripsi.string' => 'Deskripsi harus berupa teks',
            'harga.required' => 'Harga wajib diisi',
            'harga.numeric' => 'Harga harus berupa angka',
            'harga.min' => 'Harga tidak boleh kurang dari 0',
        ]);

        $kursus->update($validatedData);

        return redirect()
            ->route('admin.kursus.index')
            ->with('success', 'Kursus berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kursus = Kursus::findOrFail($id);

        $kursus->delete();

        return redirect()
            ->route('admin.kursus.index')
            ->with('success', 'Kursus berhasil dihapus!');
    }

}
