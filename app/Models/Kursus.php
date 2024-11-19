<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kursus extends Model
{
    use HasFactory;

    protected $table = 'kursus';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'judul',
        'deskripsi',
        'harga',
    ];

    // Relasi ke model User (admin yang membuat artikel)
    // Artikel.php
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function modul()
    {
        return $this->belongsTo(User::class, 'modul_id');
    }
}
