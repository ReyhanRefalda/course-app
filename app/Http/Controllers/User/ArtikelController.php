<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::where('status', 'publish')->orderBy('id', 'desc')->paginate(3);
        return view('user.artikel.index', compact('artikels'));
    }

    public function show($id)
    {
        $artikel = Artikel::with('user')->findOrFail($id); // Pastikan relasi user dimuat
        return view('user.artikel.show', compact('artikel'));
    }


}
