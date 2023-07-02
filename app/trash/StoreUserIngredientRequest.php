<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserIngredientRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'ingredient_a_p_i_id' => ['required', 'exists:App\IngredientAPI,serch'],
            'weight' => ['required', 'numeric', 'min:0'],
            'unit' => ['required', 'string', 'max:20'],
        ];
    }
}
