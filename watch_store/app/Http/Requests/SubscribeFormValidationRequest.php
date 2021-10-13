<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscribeFormValidationRequest extends FormRequest
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
            //
            'subscribe_email' => 'required|email:rfc,dns',
        ];
    }

    public function messages()
    {
        return [
            //
            'subscribe_email.required' => 'Please fill out this field',
            'subscribe_email.email' => 'This is not a email'
        ];
    }
}
