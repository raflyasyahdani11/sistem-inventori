<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransaksiKeluarRequest extends FormRequest
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
            'jumlah' => ['required', 'numeric'],
            'tanggal_keluar' => ['required'],
            'tanggal_expired' => ['required'],
        ];
    }

    public function attributes(): array
    {
        return [
            'jumlah' => 'Jumlah',
            'tanggal_keluar' => 'Tanggal Keluar',
            'tanggal_expired' => 'Tanggal Expired',
        ];
    }
}
