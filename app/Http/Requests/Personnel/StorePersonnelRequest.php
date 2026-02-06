<?php

namespace App\Http\Requests\Personnel;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonnelRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id|unique:personnels,user_id',
            'profession' => 'required|string|max:255',
            'is_actif' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'The user ID is required.',
            'user_id.exists' => 'The selected user does not exist.',
            'user_id.unique' => 'This user already has personnel record.',
            'profession.required' => 'The profession is required.',
            'profession.string' => 'The profession must be a string.',
            'profession.max' => 'The profession must not exceed 255 characters.',
            'is_actif.boolean' => 'The is_actif field must be true or false.',
        ];
    }
}
