<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->hasPermissionTo('crud data master');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rule = [
            'id_kategori' => 'required',
            'nama_program' => 'required|max:40',
        ];

        if ($this->method() == 'POST') $rule['foto'] = 'required|image|max:10240';

        return $rule;
    }
}
