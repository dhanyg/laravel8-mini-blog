<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
        $password = ['required', 'min:4'];
        $rules = [
            'username' => ['required', 'string', 'max:20', 'unique:account'],
            'password' => $password,
            'name' => ['required', 'string', 'max:50'],
            'role' => ['required']
        ];

        if ($this->method() == 'PUT') {
            if ($this->password == null) {
                $rules['password'] = ['nullable'];
            }
            $rules['username'] = ['required'];
        }

        return $rules;
    }
}
