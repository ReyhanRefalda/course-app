<?php

namespace App\Http\Controllers\Admin;

use App\Models\Artikel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArtikelRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $search = $request->search;
        $artikels = Artikel::where('users_id', $user->id)->where(function ($query) use ($search) {
            if ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            }
        })->orderBy('id', 'desc')->paginate(9)->withQueryString();
        return view('admin.artikel.index', compact('artikels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArtikelRequest $request)
    {
        // Proses upload file thumbnail
        if ($request->hasFile('tumbnail')) {
            $image = $request->file('tumbnail');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path(getenv('CUSTOM_TUMBNAIL_LOCATION'));
            $image->move($destinationPath, $image_name);
        }
    
        // Proses data sebelum menyimpan
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            // Hapus semua tag HTML dari konten
            'content' => strip_tags($request->content),
            'status' => $request->status,
            'tumbnail' => isset($image_name) ? $image_name : null,
            'slug' => $this->generateSlug($request->title),
            'users_id' => Auth::user()->id,
        ];
    
        // Simpan data ke database
        Artikel::create($data);
    
        // Redirect dengan pesan sukses
        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil ditambah!');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artikel $artikel)
    {
        Gate::authorize('edit', $artikel);
        $artikels = $artikel;
        return view('admin.artikel.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArtikelRequest $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        if ($request->hasFile('tumbnail')) {
            // Hapus file thumbnail lama jika ada
            if (isset($artikel->tumbnail) && file_exists(public_path(getenv('CUSTOM_TUMBNAIL_LOCATION') . '/' . $artikel->tumbnail))) {
                unlink(public_path(getenv('CUSTOM_TUMBNAIL_LOCATION') . '/' . $artikel->tumbnail));
            }

            // Upload file baru
            $image = $request->file('tumbnail');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path(getenv('CUSTOM_TUMBNAIL_LOCATION'));
            $image->move($destinationPath, $image_name);
        }

        // Bersihkan konten dari elemen tambahan

      
    

        $cleanContent = strip_tags($request->content, '<p><a><strong><em><ul><li><ol><blockquote><br>');


        // Data yang akan diupdate
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'content' => strip_tags($request->content),
            'status' => $request->status,
            'tumbnail' => isset($image_name) ? $image_name : $artikel->tumbnail,
            'slug' => $this->generateSlug($request->title, $artikel->id),
        ];

        $artikel->update($data);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diupdate!');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artikel $artikel)
    {
        Gate::authorize('delete', $artikel);
        if (isset($artikel->tumbnail) && file_exists(public_path(getenv('CUSTOM_TUMBNAIL_LOCATION') . '/' . $artikel->tumbnail))) {
            unlink(public_path(getenv('CUSTOM_TUMBNAIL_LOCATION') . '/' . $artikel->tumbnail));
        }

        Artikel::where('id', $artikel->id)->delete();

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus!');
    }


    private function generateSlug($title, $id = null)
    {
        $slug = Str::slug($title);
        $count = Artikel::where('slug', $slug)->when($id, function ($query, $id) {
            return $query->where('id', '!=', $id);
        })->count();
        if ($count > 0) {
            $slug = $slug . '-' . $count + 1;
        }
        return $slug;
    }
}
