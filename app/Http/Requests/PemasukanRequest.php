<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PemasukanRequest extends FormRequest
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
            'id_program'        => ['required', 'exists:programs,id_program'],
            'nama_donatur'      => ['required'],
            'email'             => ['required'],
            'jumlah_pemasukan'  => ['required'],
            'catatan'           => ['nullable']
        ];
    }
}
