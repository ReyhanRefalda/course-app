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
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'modul_id' => 'nullable|array',
            'modul_id.*' => 'exists:modul,id',
        ];

        // Jika ini adalah request untuk update, kita bisa menambahkan pengecekan untuk modul_id dan deskripsi
        if ($this->isMethod('put') || $this->isMethod('patch')) {
            // Untuk update, deskripsi tetap dibutuhkan
            $rules['deskripsi'] = 'required|string';
        }

        return $rules;
    }

    /**
     * Mendapatkan pesan kesalahan validasi khusus.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'judul.required' => 'Judul kursus harus diisi.',
            'judul.string' => 'Judul kursus harus berupa teks.',
            'judul.max' => 'Judul kursus tidak boleh lebih dari 255 karakter.',
            'deskripsi.required' => 'Deskripsi kursus harus diisi.',
            'deskripsi.string' => 'Deskripsi kursus harus berupa teks.',
            'harga.required' => 'Harga kursus harus diisi.',
            'harga.numeric' => 'Harga kursus harus berupa angka.',
            'harga.min' => 'Harga kursus tidak boleh kurang dari 0.',
            'modul_id.array' => 'Modul harus berupa array.',
            'modul_id.*.exists' => 'Modul yang dipilih tidak valid.',
        ];
    }
}
