<?php

namespace App\Http\Requests\front;

use Illuminate\Foundation\Http\FormRequest;

class AffiliateRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:affiliates,email',
            'mobile' => 'required|numeric',
            'message' => 'required',
            'state' => 'required',
            'occupation' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name field is required',
            'email.required' => 'Email field is required',
            'email.email' => 'Email ID must contain @ and .',
            'email.unique' => 'This Email Id is already exists in our records',
            'mobile.required' => 'Phone field is required',
            'mobile.numeric' => 'Phone number contains only number',
            'message.required' => 'Message field is required',
            'state.required' => 'Please Select state',
            'occupation.required' => 'Occupation field is required'
        ];
    }
}
