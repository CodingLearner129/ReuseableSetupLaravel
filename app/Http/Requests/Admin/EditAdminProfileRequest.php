<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EditAdminProfileRequest extends FormRequest
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
            'picture__input' => ["nullable", "image", "mimes:jpeg,png,jpg", "max:500"], // max:500kb
            'name' => 'required|max:50',
            'email' => 'required|email:rfc,dns,strict,spoof,filter,filter_unicode|unique:admins,email,' . Auth::user()->id,
            'address' => 'required|min:8|max:500',
        ];
    }

    public function messages(): array
    {
        return[
            'picture__input.image' => __('validation.validation.image.validImage'),
            'picture__input.mimes' => __('validation.validation.image.extensionMimes'),
            'picture__input.max' => __('validation.validation.image.maxsize'),
            'name.required' => __('validation.validation.name.required'),
            'name.max' => __('validation.validation.name.maxlength'),
            'email.required' => __('validation.validation.email.required'),
            'email.email' => __('validation.validation.email.email'),
            'email.unique' => __('validation.validation.email.unique'),
        ];
    }
}
