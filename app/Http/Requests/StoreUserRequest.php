<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => ['required','min:3'],
            'email' => ['required','email','min:3'],
            'password' => ['required','confirmed','min:5'],
            'avatar' => ['nullable','file','mimes:jpg,jpeg,png'],
            'phone_no' => ['nullable','numeric','min:6'],
            'address' => ['nullable','min:3']
        ];
    }
}
