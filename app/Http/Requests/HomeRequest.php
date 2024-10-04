<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Mengizinkan semua pengguna
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string',
            'img' => 'nullable|array',
            'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1000', // Validasi gambar
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Judul harus diisi.',
            'subtitle.required' => 'Subtitle harus diisi.',
            'img.*.required' => 'Setidaknya satu gambar harus diunggah.',
            'img.*.image' => 'File yang diunggah harus berupa gambar.',
            'img.*.mimes' => 'Gambar harus berformat jpeg, png, jpg, atau gif.',
            'img.*.max' => 'Ukuran gambar maksimum adalah 1000KB.',
        ];
    }
}
