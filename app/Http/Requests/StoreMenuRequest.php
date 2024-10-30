<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
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
            'name' => ['required','min:2'],
            'image' => ['required','file'],
            'price' => ['required','numeric'],
            'category_id' => ['required','exists:categories,id'],
            'is_available' => ['required','boolean'],
            'preparation_time' => ['required','numeric'],
            'spicy_level' => ['required','numeric'],
            'discount' => ['required','numeric'],
        ];
    }
}