<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pelajaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PelajaranController extends Controller
{
    public function index()
    {
        $pelajarans = Pelajaran::all();
        return view('admin.pelajaran.index', compact('pelajarans'));
    }

    public function create()
    {
        return view('admin.pelajaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'video_url' => 'nullable|url',
            'konten' => 'nullable|string',
        ], [
            'judul.required' => 'Judul pelajaran wajib diisi',
            'video_url.url' => 'URL video harus valid',
        ]);

        Pelajaran::create($request->all());

        return redirect()->route('admin.pelajaran.index')->with('success', 'Pelajaran berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pelajaran = Pelajaran::findOrFail($id);
        return view('admin.pelajaran.edit', compact('pelajaran'));
    }

    public function update(Request $request, $id)
    {
        $pelajaran = Pelajaran::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'video_url' => 'nullable|url',
            'konten' => 'nullable|string',
        ]);

        $pelajaran->update($request->all());

        return redirect()->route('admin.pelajaran.index')->with('success', 'Pelajaran berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pelajaran = Pelajaran::findOrFail($id);
        $pelajaran->delete();

        return redirect()->route('admin.pelajaran.index')->with('success', 'Pelajaran berhasil dihapus!');
    }
}
