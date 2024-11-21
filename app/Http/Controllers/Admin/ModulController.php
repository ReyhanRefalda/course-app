<?php

namespace App\Http\Controllers\Admin;

use App\Models\Modul;
use App\Models\Pelajaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ModulRequest;

class ModulController extends Controller
{
    public function index()
    {
        $moduls = Modul::with(['pelajaran', 'kursus'])->get();
        return view('admin.modul.index', compact('moduls'));
    }

    public function create()
    {
        $pelajarans = Pelajaran::doesntHave('modul')->get(); // Mata pelajaran tanpa modul
        return view('admin.modul.create', compact('pelajarans'));
    }

    public function store(ModulRequest $request)
    {
        // Buat Modul
        $modul = Modul::create([
            'judul' => $request->judul,
        ]);

        // Update pelajaran terkait modul
        Pelajaran::whereIn('id', $request->pelajaran)
            ->whereNull('modul_id') // Tambahkan filter untuk memastikan hanya yang belum di-assign
            ->update(['modul_id' => $modul->id]);

        return redirect()->route('admin.modul.index')->with('success', 'Modul berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $modul = Modul::with('pelajaran')->findOrFail($id); 
        $pelajarans = Pelajaran::all(); // Ambil semua pelajaran tanpa filter
    
        return view('admin.modul.edit', compact('modul', 'pelajarans'));
    }
    

    public function update(ModulRequest $request, $id)
    {
        $modul = Modul::findOrFail($id);

        // Update data modul
        $modul->update([
            'judul' => $request->judul,
        ]);

        // Hapus pelajaran yang tidak lagi terkait dengan modul ini
        Pelajaran::where('modul_id', $modul->id)
            ->whereNotIn('id', $request->pelajaran)
            ->update(['modul_id' => null]);

        // Tambahkan pelajaran yang baru ke modul ini
        Pelajaran::whereIn('id', $request->pelajaran)
            ->update(['modul_id' => $modul->id]);

        return redirect()->route('admin.modul.index')->with('success', 'Modul berhasil diperbarui!');
    }
    


    public function destroy($id)
    {
        $modul = Modul::findOrFail($id);
        $modul->delete();

        return redirect()->route('admin.modul.index')->with('success', 'Modul berhasil dihapus!');
    }
}
