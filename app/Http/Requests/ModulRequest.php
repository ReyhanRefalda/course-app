<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModulRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'judul' => 'required|string|max:255',
            'pelajaran' => 'required|array', // Pelajaran harus berupa array
            'pelajaran.*' => 'exists:pelajaran,id',
        ];
    }

    public function messages()
    {
        return [
            'judul.required' => 'Judul modul harus diisi.',
            'judul.string' => 'Judul modul harus berupa teks.',
            'judul.max' => 'Judul modul maksimal 255 karakter.',
            'pelajaran.required' => 'Pilih pelajaran yang akan ditambahkan.',
            'pelajaran.array' => 'Pelajaran harus berupa array.',
            'pelajaran.*.exists' => 'Setiap pelajaran yang dipilih harus valid.',
        ];
    }
}
