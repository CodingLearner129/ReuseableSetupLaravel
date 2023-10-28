<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EditUserProfileRequest extends FormRequest
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
            'email' => 'required|email:rfc,dns,strict,spoof,filter,filter_unicode|unique:users,email,' . Auth::user()->id,
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
            // 'phone.min' => __('validation.validation.phone.minlength'),
            // 'phone.max' => __('validation.validation.phone.maxlength'),
            // 'cafe_type.required' => __('validation.validation.cafe_type.required'),
            // 'bio.required' => __('validation.validation.bio.required'),
            // 'bio.min' => __('validation.validation.bio.minlength'),
            // 'bio.max' => __('validation.validation.bio.maxlength'),
            'address.required' => __('validation.validation.address.required'),
            'address.min' => __('validation.validation.address.minlength'),
            'address.max' => __('validation.validation.address.maxlength'),
            // 'postcode.required' => __('validation.validation.postcode.required'),
            // 'postcode.min' => __('validation.validation.postcode.minlength'),
            // 'postcode.max' => __('validation.validation.postcode.maxlength'),
            // 'website.min' => __('validation.validation.website.minlength'),
            // 'website.max' => __('validation.validation.website.maxlength'),
            // 'cafe_filter.required' => __('validation.validation.cafe_filter.required'),
        ];
    }
}
