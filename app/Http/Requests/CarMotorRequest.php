<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarMotorRequest extends FormRequest
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
            'plateNo' => 'required',
            'model' => 'required',
            'type' => 'required',
            'color' => 'required',
            'availability' => 'required|boolean',
            'rentPrice' => 'required|integer',
            'leaser' => 'required|exists:leasers,leaser_name'
        ];
    }
}
