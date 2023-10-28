<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'password' => 'required|min:8|max:15',
            'confirm_password' => 'required|min:8|same:password',
        ];
    }

    public function messages()
    {
        return[
            'password.required' => __('validation.validation.password.required'),
            'password.min' => __('validation.validation.password.minlength'),
            'password.max' => __('validation.validation.password.maxlength'),
            'confirm_password.required' => __('validation.validation.confirm_password.required'),
            'confirm_password.minlength' => __('validation.validation.confirm_password.minlength'),
            'confirm_password.same' => __('validation.validation.confirm_password.equalTo'),
        ];
    }
}
