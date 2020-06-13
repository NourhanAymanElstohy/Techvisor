<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        if (auth()->user()->role==1 || auth()->user()->role==2)
        {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:8',
        ];
    }
    else {
    return [
        'name' => 'required|min:3',
        'email' => 'required|email:rfc,dns',
    ];
        }
    }    
    public function messages()
{
    if (auth()->user()->role==1 || auth()->user()->role==2)
      {
      return [
        'name.required' => 'Please enter the name',
        'name.min' => 'The name has minimum of 3 character ',
        'email.required' => 'Please enter the email field',
        'password.required' => 'Please enter the password field',
        'password.min' => 'The password has minimum of 8 character',
          ];
      }
    else {
        return [
            'name.required' => 'Please enter the name',
            'name.min' => 'The name has minimum of 3 character ',
            'email.required' => 'Please enter the email field',
             ];

         }
}
}
