<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
            'site_name' => 'required|string',
            'site_logo' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'site_favicon' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'site_description' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required|string',
            'facebook' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
        ];
    }
    public function attributes(): array
    {
        return [
            'site_name' => __('keywords.site_name'),
            'site_logo' => __('keywords.site_logo'), 
            'site_favicon' => __('keywords.site_favicon'), 
            'site_description' => __('keywords.site_description'),
            'email' => __('keywords.email'),
            'phone' => __('keywords.phone'),
            'address' => __('keywords.address'),
            'facebook' => __('keywords.facebook'),
            'linkedin' => __('keywords.linkedin'),
            'twitter' => __('keywords.twitter'),
            'instagram' => __('keywords.instagram'),
        ];
    }
}
