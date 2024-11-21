<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PelajaranRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules()
    {
        return [
            'judul' => 'required|string|max:255',
            'video_url' => 'nullable|url',
            'konten' => 'nullable|string',
        ];
    }

    /**
     * Mendapatkan pesan kesalahan khusus untuk validasi.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'judul.required' => 'Judul pelajaran wajib diisi',
            'video_url.url' => 'URL video harus valid',
        ];
    }
}
