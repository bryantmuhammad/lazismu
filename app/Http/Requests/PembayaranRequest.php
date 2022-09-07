<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PembayaranRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required',
            'jumlah_pemasukan' => 'required|numeric|min:10000'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email tidak boleh kosong',
            'jumlah_pemasukan.required' => 'Jumlah tidak boleh kosong',
            'jumlah_pemasukan.numeric' => 'Jumlah hanya boleh angka',
            'jumlah_pemasukan.min' => 'Jumlah minimal Rp 10.000',
        ];
    }
}
