<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Komentar;
use Illuminate\Support\Facades\Auth;

class KomentarSection extends Component
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
        $this->validate([
            'content' => 'required|min:3|max:500',
        ]);

        Komentar::create([
            'content' => $this->content,
            'artikel_id' => $this->artikelId,
            'user_id' => Auth::user()->id,

        ]);

        $this->content = '';
        $this->loadComments();
    }

    public function render()
    {
        return view('livewire.komentar-section');
    }
}
