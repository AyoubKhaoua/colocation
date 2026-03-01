<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpenseRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:100'],
            'amount' => ['required', 'numeric', 'min:0.01'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'payer_colocationuser_id' => ['required', 'exists:users,id'],

        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'title required',
            'amount.required' => 'amount required',
            'amount.numeric' => 'amount must be number',
            'payer_colocationuser_id.required' => 'payer required',
        ];
    }
}
