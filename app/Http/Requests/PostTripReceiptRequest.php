<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostTripReceiptRequest extends FormRequest
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
            'pretrip' => 'required|exists:pretripreceipts,pretrip_ID',
            'agent' => 'required|exists:agents,agent_name',
            'customer' => 'required|exists:customers,customer_name',
            'return-date' => 'required|date',
            'initial-gas' => 'required|integer',
            'comment' => '',
            'gas' => 'required|integer',
            'gas-price' => 'required|integer|decimal:0,2',
            'optional-cost' => 'required|integer|decimal:0,2',
        ];
    }
}
