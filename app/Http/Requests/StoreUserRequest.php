<?php

namespace App\Http\Requests;

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
            
                'name' => 'required|min:3',
                'email' => 'required|email:rfc,dns',
                'role' => 'required',

                    ];
        
    }
    public function messages()
{
    return [
        'name.required' => 'Please enter the name',
        'name.min' => 'The name has minimum of 3 character ',
        'email.required' => 'Please enter the email field',
        'role.required' => 'Please choose a role !',
    ];
}
}
