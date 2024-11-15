<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikel';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'judul',
        'isi',
        'users_id',
    ];

    // Relasi ke model User (admin yang membuat artikel)
  // Artikel.php
  public function user()
  {
      return $this->belongsTo(User::class, 'users_id');
  }


   
}
