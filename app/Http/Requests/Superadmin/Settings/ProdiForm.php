<?php

namespace App\Http\Requests\Superadmin\Settings;

use App\Constants\RequestRuleConstant;
use Illuminate\Foundation\Http\FormRequest;

class ProdiForm extends FormRequest
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
            'tingkat' => 'required'
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
        'body.required' => 'A message is required',
    ];
}
}
