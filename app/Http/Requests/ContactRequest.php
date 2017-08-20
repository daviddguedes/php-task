<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ContactRequest extends FormRequest
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

    public function rules(Request $request)
    {
        if($request->method() != 'PUT'){
            $validated = [
                'image' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'phone' => 'required'
            ];
        }else {
            $validated = [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'phone' => 'required'
            ];
        }

        return $validated;
    }

    public function messages()
    {
        return [
            'image.required' => 'Image is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email field is wrong format',
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'phone.required' => 'Phone is required'
        ];
    }
}
