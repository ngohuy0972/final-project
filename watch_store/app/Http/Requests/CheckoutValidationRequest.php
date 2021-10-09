<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // doesn't need check authorize 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // error
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|regex:/(0)[0-9]{9}/|numeric|min:10',
            'shipping_email' => 'required|email:rfc,dns',
            'shipping_address' => 'required',
            'city' => 'required',
            'zip' => 'required|numeric|min:5',
            'payment_method' => 'required'
            
        ];
    }

    public function messages()
    {
        return [
            // error messages
            'first_name.required' => 'Please fill out this field',
            'last_name.required' => 'Please fill out this field',
            'phone_number.required' => 'Please fill out this field',
            'phone_number.regex' => 'This is not a phone number',
            'phone_number.min' => 'Phone number must be least 10 number',
            // 'phone_number.max' => 'Phone number can not exceed 11 number',
            'phone_number.numeric' => 'Phone number must be number',
            'shipping_email.required' => 'Please fill out this field',
            'shipping_email.email' => 'This is not a email address',
            'shipping_address.required' => 'Please fill out this field',
            'city.required' => 'Please fill out this field',
            'zip.required' => 'Please fill out this field',
            'zip.numeric' => 'Postal Code must be number',
            'zip.min' => 'Postal Code must be least 5 number',
            // 'zip.max' => 'Postal Code can not exceed 7 number'
        ];
    } 
}
