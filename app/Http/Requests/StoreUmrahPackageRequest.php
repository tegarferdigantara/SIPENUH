<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUmrahPackageRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:umrah_packages,name',
            'description' => 'required|string',
            'departure_date' => 'required|date|date_format:Y-m-d',
            'duration' => 'required|integer|min:1',
            'price' => 'required|integer|min:0',
            'facility' => 'required|string',
            'destination' => 'required|string',
            'quota' => 'required|integer|min:1',
            'status' => 'required|in:ACTIVE,FULL,CLOSED',
            'user_creator_id' => 'required|exists:users,id'
        ];
    }
}
