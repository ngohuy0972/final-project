<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Kiem tra quyen co login hay khong (true = khong can quyen, false = can quyen).
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
            //
            'email' => 'required | email:rfc,dns | unique:users,email | string',
            'name' => 'required | min:5 | max:50 | string',
            'password' => 'required | min:5 | max:25 | confirmed | string'
        ];
    }

    public function messages()
    {
        //
        return [
            'email.required' => 'Please fill this field',
            'email.email' => 'This is not a email',
            'email.unique' => 'This email is already exists',
            'name.required' => 'Please fill this field',
            'name.min' => 'Name must be least 5 characters',
            'name.max' => 'Name must be less 50 characters',
            'password.required' => 'Please fill this field',
            'password.min' => 'Password must be least 8 characters',
            'password.max' => 'Password must be less 50 characters',
            'password.confirmed' => 'Password does not matching'


        ];
    }
}