<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRequest extends FormRequest
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
            'name'      => ['alpha', 'required'],
            'email'     => ['required', 'email:dns', Rule::unique('users')->ignore($this->user()->id)],
        ];

        if ($this->method() == 'POST') {
            $rule['email']      = ['required', 'email:dns', 'unique:users'];
            $rule['password']   = ['required'];
        }

        return $rule;
    }
}
