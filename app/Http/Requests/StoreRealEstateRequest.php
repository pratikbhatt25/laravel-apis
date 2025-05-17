<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRealEstateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:128',
            'real_state_type' => 'required|in:house,department,land,commercial_ground',
            'street' => 'required|string|max:128',
            'external_number' => 'required|regex:/^[A-Za-z0-9-]+$/|max:12',
            'internal_number' => [
                'nullable', 'regex:/^[A-Za-z0-9-\s]+$/',
                'required_if:real_state_type,department,commercial_ground',
            ],
            'neighborhood' => 'required|string|max:128',
            'city' => 'required|string|max:64',
            'country' => 'required|alpha|size:2',
            'rooms' => 'required|integer|min:0',
            'bathrooms' => 'nullable|numeric|min:0',
            'comments' => 'nullable|string|max:128',
        ];
    }
}
