<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExtensionRequest extends FormRequest
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
            'id' => 'required|integer',
            'ulid' => 'required|ulid',
            'plateNo' => 'required',
            'type' => 'required',
            'cost' => 'required|integer|decimal:0,2',
            'original-date' => 'required|date',
            'new-date' => 'required|date',
        ];
    }
}
