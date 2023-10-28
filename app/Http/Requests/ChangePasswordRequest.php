<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'current_password' => 'required|min:8|max:15',
            'new_password' => 'required|min:8|max:15',
            'confirm_password' => 'required|min:8|same:new_password',
        ];
    }

    public function messages(): array
    {
        return[
            'current_password.required' => __('validation.validation.current_password.required'),
            'current_password.min' => __('validation.validation.current_password.minlength'),
            'current_password.max' => __('validation.validation.current_password.maxlength'),
            'new_password.required' => __('validation.validation.new_password.required'),
            'new_password.min' => __('validation.validation.new_password.minlength'),
            'new_password.max' => __('validation.validation.new_password.maxlength'),
            'confirm_password.required' => __('validation.validation.confirm_password.required'),
            'confirm_password.minlength' => __('validation.validation.confirm_password.minlength'),
            'confirm_password.same' => __('validation.validation.confirm_password.equalToNewPassword'),
        ];
    }
}
