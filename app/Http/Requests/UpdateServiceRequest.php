<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
            'title' => 'required|string',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'description' => 'required'
        ];
    }
    public function attributes(): array
    {
        return [
            'title' => __('keywords.title'),
            'image' => __('keywords.image'),
            'description' => __('keywords.description'),
        ];
    }
}
