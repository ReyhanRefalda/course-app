<?php

namespace App\Livewire;

use Livewire\Component as LivewireComponent;
use App\Models\Komentar;
use Illuminate\Support\Facades\Auth;

class KomentarSection extends LivewireComponent
{
    public $artikelId;
    public $komentars;
    public $content;

    public function mount($artikelId)
    {
        $this->artikelId = $artikelId;
        $this->loadComments();
    }

    public function loadComments()
    {
        $this->komentars = Komentar::where('artikel_id', $this->artikelId)
            ->latest()
            ->with('user')
            ->get();
    }

    public function addComment()
    {
        $this->validate(
            [
                'content' => 'required|min:3|max:500',
            ],
            [
                'content.required' => 'Komentar harus diisi',
            ]
        );

        Komentar::create([
            'content' => $this->content,
            'artikel_id' => $this->artikelId,
            'user_id' => Auth::user()->id,
        ]);

        $this->reset('content');
        $this->loadComments(); // Refresh komentar
    }

    public function render()
    {
        return view('livewire.komentar-section');
    }
}
