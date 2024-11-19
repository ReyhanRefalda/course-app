<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    protected $table = 'modul';

    // fillable
    protected $fillable = [
        'judul',
        'kursus_id',
    ];

    // Relationship
    public function kursus()
    {
        return $this->belongsTo(Kursus::class, 'kursus_id');
    }
}
