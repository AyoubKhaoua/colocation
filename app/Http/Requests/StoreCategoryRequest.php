<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2', 'max:50'],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Le nom de la catégorie est obligatoire',
            'name.min'      => 'Le nom doit contenir au moins 2 caractères',
            'name.max'      => 'Le nom ne doit pas dépasser 50 caractères',
            'name.string'   => 'Le nom doit être une chaîne de caractères',
        ];
    }
}
