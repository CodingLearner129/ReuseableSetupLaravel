<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
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
        ];
    }

    public function messages(): array
    {
        return[
            'email.required' => __('validation.validation.email.required'),
            'email.email' => __('validation.validation.email.email'),
        ];
    }
}
