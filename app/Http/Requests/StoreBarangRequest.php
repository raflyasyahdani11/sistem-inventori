<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBarangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'kode' => ['required', 'unique:barang,kode'],
            'nama' => ['required'],
            'jumlah' => ['required', 'numeric'],
            'jenis' => ['required'],
            'satuan' => ['required'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'kode' => 'Kode',
            'nama' => 'Nama',
            'jumlah' => 'Jumlah',
            'jenis' => 'Jenis',
            'satuan' => 'Satuan',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        $inputKode = $this->input('kode');

        return [
            'kode.unique' => ":attribute <b>$inputKode</b> sudah tedaftar, masukkan kode lain.",
        ];
    }
}
