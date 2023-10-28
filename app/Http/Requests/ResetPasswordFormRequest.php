<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'token' => 'required',
            'user-type' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'token.required' => __('validation.validation.token.required'),
            'user-type.required' => __('validation.validation.user_type.required'),
        ];
    }
}
