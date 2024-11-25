<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function index()
    {
        $lastData = $this->lastData();

        $secondToFifthData = Artikel::where('status', 'publish')
            ->where('id', '!=', $lastData->id)
            ->orderBy('id', 'desc')
            ->skip(0)
            ->take(4)
            ->get();

        $artikels = Artikel::where('status', 'publish')
            ->whereNotIn('id', $secondToFifthData->pluck('id')->prepend($lastData->id))
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('user.artikel.index', compact('artikels', 'lastData', 'secondToFifthData'));
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
