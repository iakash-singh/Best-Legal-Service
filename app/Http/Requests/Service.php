<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Service extends FormRequest
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
            'service_name' => 'required',
            'ptitle' => 'required',
            'desc' => 'required',
            'service_category' => 'required',
            'service_subcat' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
