<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PelajaranRequest;
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

    public function store(PelajaranRequest $request)
    {
        $data = $request->validated();

        Pelajaran::create($data);

        return redirect()->route('admin.pelajaran.index')->with('success', 'Pelajaran berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pelajaran = Pelajaran::findOrFail($id);
        return view('admin.pelajaran.edit', compact('pelajaran'));
    }

    public function update(PelajaranRequest $request, $id)
    {
        $pelajaran = Pelajaran::findOrFail($id);

        $data = $request->validated();

        $pelajaran->update($data);

        return redirect()->route('admin.pelajaran.index')->with('success', 'Pelajaran berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pelajaran = Pelajaran::findOrFail($id);
        $pelajaran->delete();

        return redirect()->route('admin.pelajaran.index')->with('success', 'Pelajaran berhasil dihapus!');
    }
}
