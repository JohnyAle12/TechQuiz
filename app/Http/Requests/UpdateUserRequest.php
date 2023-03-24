<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:100', 'min:5', 'regex:/^[a-zA-Z]{5,100}/'],
            'lastname' => ['required', 'string', 'max:100', 'min:5', 'regex:/^[a-zA-Z]{5,100}/'],
            'country' => ['required', 'string'],
            'address' => ['required', 'string', 'max:180'],
            'mobile' => ['required', 'integer', 'max_digits:10', 'min_digits:10', 'regex:/^([0-9]{10}+\.?[0-9]{0,2})$/']
        ];
    }
}
