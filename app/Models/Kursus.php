<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    use HasFactory;

    /**
     * Nama tabel (jika berbeda dari default).
     */
    protected $table = 'kursus';

    /**
     * Atribut yang dapat diisi (mass assignable).
     */
    protected $fillable = [
        'judul',
        'deskripsi',
        'harga',
    ];

    /**
     * Relasi ke modul (one-to-many, kursus -> modul).
     */
    public function modul()
    {
        return $this->hasMany(Modul::class);
    }

}
