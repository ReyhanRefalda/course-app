<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('id'); // Ambil parameter id dari rute
        return [
            'nama' => 'required|string|max:15',
            'email' => 'required|string|email|max:25|unique:users,email,' . $id,
            'role' => 'required|exists:roles,name', // Validasi role harus ada di tabel roles
        ];
    }
    
    public function messages()
    {
        return [
            'nama.required' => 'Nama tidak boleh kosong.',
            'nama.string' => 'Nama harus berupa huruf.',
            'nama.max' => 'Nama tidak boleh lebih dari 15 karakter.',
            'email.required' => 'Email tidak boleh kosong.',
            'email.string' => 'Email harus berupa huruf.',
            'email.max' => 'Email tidak boleh lebih dari 25 karakter.',
            'email.unique' => 'Email sudah digunakan.',
            'role.required' => 'Role tidak boleh kosong.',
            'role.exists' => 'Role yang dipilih tidak valid.',
        ];
    }
    
}

