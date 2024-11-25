<?php

namespace App\Http\Controllers\Admin;

use App\Models\Modul;
use App\Models\Kursus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KursusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $moduls = Modul::whereNull('kursus_id')->get();
        $search = $request->search;


        $kursus = Kursus::with('modul')
            ->when($search, function ($query) use ($search) {
                $query->where('judul', 'like', '%' . $search . '%');
            })
            ->get();

        return view('admin.kursus.index', compact('kursus', 'moduls'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $moduls = Modul::whereNull('kursus_id')->get();
        return view('admin.kursus.create', compact('moduls'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'modul_id' => 'nullable|array',
            'modul_id.*' => 'exists:modul,id',
        ]);

        $kursus = Kursus::create([
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'] ?? '',
            'harga' => $validated['harga'],
        ]);

        if (!empty($validated['modul_id'])) {
            Modul::whereIn('id', $validated['modul_id'])->update(['kursus_id' => $kursus->id]);
        }

        return redirect()->route('admin.kursus.index')->with('success', 'Kursus berhasil ditambahkan.');
    }



    /**
     * Display the specified resource.
     */
    public function show(Kursus $kursus) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kursus = Kursus::with('modul')->findOrFail($id);
        $moduls = Modul::whereNull('kursus_id')
            ->orWhere('kursus_id', $kursus->id)
            ->get();

        return view('admin.kursus.edit', compact('kursus', 'moduls'));
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
            'modul_id' => 'nullable|array',
            'modul_id.*' => 'exists:modul,id',
        ]);

        $kursus->update($validatedData);


        if (isset($validatedData['modul_id'])) {
            Modul::whereIn('id', $validatedData['modul_id'])->update(['kursus_id' => $kursus->id]);
            Modul::whereNotIn('id', $validatedData['modul_id'])
                ->where('kursus_id', $kursus->id)
                ->update(['kursus_id' => null]);
        } else {

            Modul::where('kursus_id', $kursus->id)->update(['kursus_id' => null]);
        }

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
