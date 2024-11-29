<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KursusRequest extends FormRequest
{
    /**
     * Tentukan apakah pengguna memiliki izin untuk membuat permintaan ini.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Ganti dengan logika izin jika diperlukan
    }

    /**
     * Dapatkan aturan validasi yang akan diterapkan pada permintaan.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'judul' => 'required|string|max:255|unique:kursus,judul,' . $this->route('kursu'),
            'deskripsi' => 'required|string|min:10',
            'harga' => 'required|min:0',
            'modul_id' => 'required|array|min:1',
            'modul_id.*' => 'exists:modul,id',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'judul.required' => 'Judul kursus harus diisi.',
            'judul.string' => 'Judul kursus harus berupa teks.',
            'judul.max' => 'Judul kursus tidak boleh lebih dari 255 karakter.',
            'judul.unique' => 'Judul kursus sudah digunakan.',
            'deskripsi.required' => 'Deskripsi kursus harus diisi.',
            'deskripsi.string' => 'Deskripsi kursus harus berupa teks.',
            'deskripsi.min' => 'Deskripsi kursus harus memiliki setidaknya 10 karakter.',
            'harga.required' => 'Harga kursus harus diisi.',
            'harga.numeric' => 'Harga kursus harus berupa angka.',
            'harga.min' => 'Harga kursus tidak boleh kurang dari 0.',
            'harga.max' => 'Harga kursus tidak boleh lebih dari 1 juta.',
            'harga.integer' => 'Harga kursus harus berupa angka bulat.',
            'modul_id.array' => 'Modul harus berupa array.',
            'modul_id.required' => 'Kursus setidaknya harus memiliki 1 modul.',
            'modul_id.*.exists' => 'Modul yang dipilih tidak valid.',
        ];
    }
}
