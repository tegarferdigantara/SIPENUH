<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreConsumerDocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
         */
    }
    public function rules(): array
    {
        return [
            'consumer_id' => 'required',
            'consumer_photo' => 'nullable|image|max:2048|file|mimes:png,jpg',
            'passport_number' => 'nullable|string|max:8',
            'passport_photo' => 'nullable|image|max:2048|file|mimes:png,jpg',
            'id_number' => 'nullable|integer|max:16|min:16',
            'id_photo' => 'nullable|image|max:2048|file|mimes:png,jpg',
            'birth_certificate_photo' => 'nullable|image|max:2048|file|mimes:png,jpg',
            'family_card_photo' => 'nullable|image|max:2048|file|mimes:png,jpg',
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
                'passport_number' => strtoupper($this->passport_number)
            ]);
        }
    }

    public function messages()
    {
        return [
            'passport_number.max' => 'Nomor Paspor tidak boleh lebih dari 8 karakter.',
            'id_number.min' => 'Nomor NIK (KTP) harus minimal 16 karakter.',
            'id_number.max' => 'Nomor NIK (KTP) tidak boleh lebih dari 16 karakter.',
            'id_number.integer' => 'Nomor NIK (KTP) harus berupa bilangan bulat/angka.
Contoh: *Nomor NIK (KTP): 1234567890123456*'
        ];
    }
}
