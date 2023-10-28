<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
            // 'email' => 'required|email:rfc,dns,strict,spoof,filter,filter_unicode|unique:users',
            'email' => 'required|email:rfc,dns,strict,filter,filter_unicode|unique:users',
            'name' => 'required|max:50',
            'password' => 'required|min:8|max:15',
        ];
    }

    public function messages(): array
    {
        return[
            'email.required' => __('validation.validation.email.required'),
            'email.email' => __('validation.validation.email.email'),
            'email.unique' => __('validation.validation.email.unique'),
            'name.required' => __('validation.validation.name.required'),
            'name.max' => __('validation.validation.name.maxlength'),
            'password.required' => __('validation.validation.password.required'),
            'password.min' => __('validation.validation.password.minlength'),
            'password.max' => __('validation.validation.password.maxlength'),
        ];
    }
}
