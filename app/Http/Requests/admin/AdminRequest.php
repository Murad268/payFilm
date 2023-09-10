<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'login' => ['required'],
            'password' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'login.required' => 'The name field is required.',
            'password.required' => 'The password field is required.',
        ];
    }
}
