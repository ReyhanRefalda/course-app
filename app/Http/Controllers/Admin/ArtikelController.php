<?php

namespace App\Http\Controllers\Admin;

use App\Models\Artikel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
        })->orderBy('id', 'desc')->paginate(3)->withQueryString();
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
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'tumbnail' => 'required|image|mimes:jpeg,png,jpg,svg,gif,webp|max:10240',
        ], [
            'title.required' => 'Judul wajib diisi',
            'content.required' => 'Isi wajib diisi',
            'tumbnail.image' => 'Hanya gambar yang dibolehkan',
            'tumbnail.mimes' => 'Gambar harus berupa file gambar (jpeg, png, jpg, svg, gif, webp)',
            'tumbnail.max' => 'Gambar tidak boleh lebih besar dari 10MB',
        ]);

        if ($request->hasFile('tumbnail')) {
            $image = $request->file('tumbnail');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path(getenv('CUSTOM_TUMBNAIL_LOCATION'));
            $image->move($destinationPath, $image_name);
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'status' => $request->status,
            'tumbnail' => isset($image_name) ? $image_name : null,
            'slug' => $this->generateSlug($request->title),
            'users_id' => Auth::user()->id,
        ];

        Artikel::create($data);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diupdate!');
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
    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'tumbnail' => 'image|mimes:jpeg,png,jpg,svg,gif,webp|max:10240',
        ], [
            'title.required' => 'Judul wajib diisi',
            'content.required' => 'Isi wajib diisi',
            'tumbnail.image' => 'Hanya gambar yang dibolehkan',
            'tumbnail.mimes' => 'Gambar harus berupa file gambar (jpeg, png, jpg, svg, gif, webp)',
            'tumbnail.max' => 'Gambar tidak boleh lebih besar dari 10MB',
        ]);

        if ($request->hasFile('tumbnail')) {
            if (isset($artikel->tumbnail) && file_exists(public_path(getenv('CUSTOM_TUMBNAIL_LOCATION') . '/' . $artikel->tumbnail))) {
                unlink(public_path(getenv('CUSTOM_TUMBNAIL_LOCATION') . '/' . $artikel->tumbnail));
            }
            $image = $request->file('tumbnail');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path(getenv('CUSTOM_TUMBNAIL_LOCATION'));
            $image->move($destinationPath, $image_name);
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'status' => $request->status,
            'tumbnail' => isset($image_name) ? $image_name : $artikel->tumbnail,
            'slug' => $this->generateSlug($request->title, $artikel->id)
        ];

        Artikel::where('id', $artikel->id)->update($data);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil ditambah!');
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
