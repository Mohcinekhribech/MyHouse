<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' =>['required','string','max:255'],
            'email' =>['required','string','max:255','unique:users'],
            'role' => ['required'],
            'avatar' => ['required'],
            'password' =>['required','confirmed',Password::defaults()]
        ];
    }
}
