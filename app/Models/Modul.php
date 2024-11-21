<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    use HasFactory;

    protected $table = 'modul';

   
    /**
     * Atribut yang dapat diisi (mass assignable).
     */
    protected $fillable = [
        'judul',
        'kursus_id', // Menghubungkan ke kursus jika diperlukan
    ];

    /**
     * Relasi ke kursus (one-to-many, modul -> kursus).
     */
    public function kursus()
    {
        return $this->belongsTo(Kursus::class);
    }


    /**
     * Relasi ke pelajaran (one-to-many, modul -> pelajaran).
     */
    public function pelajaran()
    {
        return $this->hasMany(Pelajaran::class, 'modul_id'); // 'modul_id' adalah foreign key di tabel pelajaran
    }
}
