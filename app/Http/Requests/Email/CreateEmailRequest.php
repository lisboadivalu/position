<?php

namespace App\Http\Requests\Email;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmailRequest extends FormRequest
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
            'email' => 'required|email',
            'name' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
          'email.required' => ':attribute is required',
          'email.email' => 'the :attribute must to be a valid email address',
          'name.required' => ':attribute is required',
          'name.string' => 'the :attribute must to be of string type',
        ];
    }
}
