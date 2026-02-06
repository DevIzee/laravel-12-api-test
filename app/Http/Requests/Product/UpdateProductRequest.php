<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'personnel_id' => 'sometimes|exists:personnels,id',
            'nom' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'type' => 'sometimes|string|max:255',
            'prix' => 'sometimes|numeric|min:0',
            'montant_total' => 'sometimes|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:1024',
        ];
    }

    public function messages(): array
    {
        return [
            'personnel_id.exists' => 'The selected personnel does not exist.',
            'nom.max' => 'The product name must not exceed 255 characters.',
            'type.max' => 'The type must not exceed 255 characters.',
            'prix.numeric' => 'The price must be a number.',
            'prix.min' => 'The price must be at least 0.',
            'montant_total.numeric' => 'The total amount must be a number.',
            'montant_total.min' => 'The total amount must be at least 0.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, jpg, png, gif, webp.',
            'image.max' => 'The image must not be greater than 1MB.',
        ];
    }
}
