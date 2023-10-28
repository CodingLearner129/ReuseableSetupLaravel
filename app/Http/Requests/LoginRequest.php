<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'email' => 'required|email:rfc,dns,strict,spoof,filter,filter_unicode',
            'email' => 'required|email:rfc,dns,strict,filter,filter_unicode',
            'password' => 'required|min:8|max:20'
        ];
    }

    public function messages(): array
    {
        return[
            'email.required' => __('validation.validation.email.required'),
            'email.email' => __('validation.validation.email.email'),
            'password.required' => __('validation.validation.password.required'),
            'password.min' => __('validation.validation.password.minlength'),
            'password.max' => __('validation.validation.password.maxlength'),
        ];
    }
}
