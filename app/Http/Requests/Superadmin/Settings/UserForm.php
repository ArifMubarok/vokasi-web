<?php

namespace App\Http\Requests\Superadmin\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UserForm extends FormRequest
{
    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'role_id' => 'required',
            'email' => 'required|email:rfc,dns|unique:App\Models\User,email',
            'password' => 'required|min:8',
            'password1' => 'same:password',
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
            'name.required' => 'A name is required',
            'role_id.required' => 'A role is required',
            'email.required' => 'An email is required',
            'password' => 'A password is required',
            'password1' => 'Password not match',
            // 'body.required' => 'A message is required',
        ];
    }
}
