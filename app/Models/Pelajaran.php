<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    use HasFactory;

    protected $table = 'pelajaran';

    /**
     * Atribut yang dapat diisi (mass assignable).
     */
    protected $fillable = [
        'judul',
        'video_url',
        'konten',
        'modul_id', // Foreign key ke modul
    ];

    /**
     * Relasi ke modul (pelajaran -> modul).
     */
    public function modul()
    {
        return $this->belongsTo(Modul::class, 'modul_id');
    }
}
