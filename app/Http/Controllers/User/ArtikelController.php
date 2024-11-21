<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function index()
    {
        $lastData = $this->lastData();

        $artikels = Artikel::where('status', 'publish')->where('id', '!=', $lastData->id)->orderBy('id', 'desc')->paginate(10);
        return view('user.artikel.index', compact('artikels', 'lastData'));
    }

    public function detail($slug)
    {
        $artikels = Artikel::where('status', 'publish')->where('slug', $slug)->firstOrFail();
        return view('user.artikel.show', compact('artikels'));
    }

    public function lastData()
    {
        $artikels = Artikel::where('status', 'publish')->orderBy('id', 'desc')->latest()->first();
        return $artikels;
    }
}
