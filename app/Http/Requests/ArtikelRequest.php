<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtikelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'content' => 'required',
            'tumbnail' => 'image|mimes:jpeg,png,jpg,svg,gif,webp|max:10240',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Judul wajib diisi',
            'content.required' => 'Isi wajib diisi',
            'tumbnail.image' => 'Hanya gambar yang dibolehkan',
            'tumbnail.mimes' => 'Gambar harus berupa file gambar (jpeg, png, jpg, svg, gif, webp)',
            'tumbnail.max' => 'Gambar tidak boleh lebih besar dari 10MB',
        ];
    }
}
