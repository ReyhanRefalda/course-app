<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PelajaranRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        $id = $this->route('pelajaran');

        return [
            'judul' => 'required|string|regex:/^[a-zA-Z0-9\s\-\_,\.\!\?\(\)\?!]+$/|min:7|max:255',
            'video_url' => [
                'required',
                'url',
                Rule::unique('pelajaran', 'video_url')->ignore($id),
            ],
            'konten' => 'required|string|min:10|max:5000',
        ];
    }

    /**
     * Mendapatkan pesan kesalahan khusus untuk validasi.
     */
    public function messages()
    {
        return [
            'judul.required' => 'Judul pelajaran wajib diisi.',
            'judul.string' => 'Judul pelajaran hanya bisa berupa huruf dan angka.',
            'judul.regex' => 'Judul hanya boleh berisi huruf, angka, spasi, dan beberapa tombol.',
            'judul.max' => 'Judul pelajaran tidak boleh lebih dari 255 karakter.',
            'judul.min' => 'Judul pelajaran tidak boleh kurang dari 7 karakter.',

            'video_url.required' => 'URL video pelajaran wajib diisi.',
            'video_url.url' => 'URL video harus valid.',
            'video_url.unique' => 'URL video sudah digunakan. Harap gunakan URL yang berbeda.',

            'konten.required' => 'Konten pelajaran wajib diisi.',
            'konten.min' => 'Konten pelajaran minimal 10 karakter.',
            'konten.max' => 'Konten pelajaran tidak boleh lebih dari 5000 karakter.',
        ];
    }
}
