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
            'judul' => 'required|string|max:30|regex:/^[a-zA-Z0-9\s\-\_,\.\!\?\(\)\?!]+$/|min:3',
            'pelajaran' => 'required|array|min:1', // Pelajaran harus berupa array
            'pelajaran.*' => 'exists:pelajaran,id',
        ];
    }

    public function messages()
    {
        return [
            'judul.required' => 'Judul modul harus diisi.',
            'judul.string' => 'Judul modul harus berupa huruf dan angka.',
            'judul.max' => 'Judul modul maksimal 30 karakter.',
            'judul.min' => 'Judul modul minimal 3 karakter.',
            'judul.regex' => 'Judul hanya boleh mengandung huruf, angka, spasi, dan beberapa simbol',

            'pelajaran.required' => 'Minimal pilih 1 pelajaran.',
            'pelajaran.array' => 'Pelajaran harus berupa array.',
            'pelajaran.*.exists' => 'Setiap pelajaran yang dipilih harus valid.',
        ];
    }
}
