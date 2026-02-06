<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'personnel_id' => 'required|exists:personnels,id',
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
            'montant_total' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:1024',
        ];
    }

    public function messages(): array
    {
        return [
            'personnel_id.required' => 'The personnel ID is required.',
            'personnel_id.exists' => 'The selected personnel does not exist.',
            'nom.required' => 'The product name is required.',
            'nom.max' => 'The product name must not exceed 255 characters.',
            'description.required' => 'The description is required.',
            'type.required' => 'The type is required.',
            'type.max' => 'The type must not exceed 255 characters.',
            'prix.required' => 'The price is required.',
            'prix.numeric' => 'The price must be a number.',
            'prix.min' => 'The price must be at least 0.',
            'montant_total.required' => 'The total amount is required.',
            'montant_total.numeric' => 'The total amount must be a number.',
            'montant_total.min' => 'The total amount must be at least 0.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, jpg, png, gif, webp.',
            'image.max' => 'The image must not be greater than 1MB.',
        ];
    }
}
