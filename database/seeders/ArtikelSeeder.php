<?php

namespace Database\Seeders;

use App\Models\Artikel;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $judul = [
            'Bitcoin membuat all time high baru',
            'cara menjadi kaya',
            'cara menjadi public speaker seperti Tim Cook',
            'cara menjadi seorang developer',
            'cara menjadi seorang programmer',
        ];

        foreach ($judul as $j) {
            $slug = Str::slug($j);
            $slugOri = $slug;
            $count = 1;
            while (Artikel::where('slug', $slug)->exists()) {
                $slug = $slugOri . '-' . $count;
                $count++;
            }
            Artikel::create([
                'title' => $j,
                'slug' => $slug,
                'description' => 'Deskripsi unuk' . $j,
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus .' . $j,
                'status' => 'publish',
                'users_id' => 2,
            ]);
        }
    }
}
