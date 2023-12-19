<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreTripReceiptRequest extends FormRequest
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
            'agent_name' => 'required',
            'customer_name' => 'required',
            'vehicle_type' => 'required',
            'vehicle_plateNo' => 'required',
            'vehicle_rentPrice' => 'required|integer|decimal:0,2',
            'validIdentification' => 'required',
            'start-date' => 'required|date',
            'end-date' => 'required|date',
            'destination' => 'required',
            'destination-price' => 'required|integer|decimal:0,2',
            'initial-gas' => 'required|integer',
            'gas' => 'required|integer',
            'gas_price' => 'required|integer|decimal:0,2',
            'wash' => 'required|boolean',
            'helmet' => 'required|boolean'
        ];
    }
}
