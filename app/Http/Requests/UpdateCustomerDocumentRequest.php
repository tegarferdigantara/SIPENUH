<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateCustomerDocumentRequest extends FormRequest
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
            'customer_photo' => 'nullable|image|max:2048|file|mimes:png,jpg',
            'passport_number' => 'nullable|string|max:8',
            'passport_photo' => 'nullable|image|max:2048|file|mimes:png,jpg',
            'id_number' => 'nullable|string|size:16|regex:/^[0-9]+$/',
            'id_photo' => 'nullable|image|max:2048|file|mimes:png,jpg',
            'birth_certificate_photo' => 'nullable|image|max:2048|file|mimes:png,jpg',
            'family_card_photo' => 'nullable|image|max:2048|file|mimes:png,jpg',
            'passport_number_verification' => 'nullable|string|unique:customer_documents,passport_number_verification' . ($this->customer_document ? ",{$this->customer_document->id}" : ''),
            'id_number_verification' => 'nullable|string|unique:customer_documents,id_number_verification' . ($this->customer_document ? ",{$this->customer_document->id}" : ''),

        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response([
            "errors" => $validator->getMessageBag()
        ], 422));
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

    public function messages()
    {
        return [
            'passport_number.max' => 'Nomor Paspor tidak boleh lebih dari 8 karakter.',
            'passport_number_verification.unique' => 'Nomor Paspor sudah terdaftar di dalam database.',
            'id_number.min' => 'Nomor KTP (NIK) harus minimal 16 karakter.',
            'id_number.max' => 'Nomor KTP (NIK) tidak boleh lebih dari 16 karakter.',
            'id_number_verification.unique' => 'Nomor KTP (NIK) sudah terdaftar di dalam database.',
            'id_number.integer' => 'Nomor KTP (NIK) harus berupa bilangan bulat/angka.
Contoh: *Nomor KTP (NIK): 1234567890123456*'
        ];
    }
}
