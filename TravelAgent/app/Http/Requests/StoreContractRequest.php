<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContractRequest extends FormRequest
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
            'rates' => 'required|max:255',
            'name' => 'required|max:255',
            'agent_id' => 'required|max:255',
            'accommodation_id' => 'required|max:255',
            'start_date' => 'required|max:255|date',
            'end_date' => 'required|max:255|date',
        ];
    }
}
