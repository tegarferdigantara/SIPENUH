<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'full_name' => 'required|string|max:255',
            'whatsapp_number' => 'required|string|regex:/^08[0-9]{8,11}$/',
            'gender' => 'required|string|max:10',
            'birth_place' => 'required|string|max:50',
            'birth_date' => 'required|date_format:Y-m-d', // Validasi format tanggal lahir setelah diubah
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'subdistrict' => 'required|string|max:255',
            'family_number' => 'nullable|string|max:20',
            'email' => 'nullable|string|max:255',
            'umrah_package_id' => 'required|integer',
            'passport_number' => 'nullable|string|min:8|max:8',
            'id_number' => 'required|string|size:16|regex:/^[0-9]+$/',
        ];
    }
    protected function prepareForValidation()
    {
        if ($this->passport_number) {
            $this->merge([
                'passport_number' => strtoupper($this->passport_number),
                'passport_number_verification' => strtoupper($this->passport_number_verification)
            ]);
        }
    }
}
