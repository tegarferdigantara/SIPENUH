<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateCustomerDocumentRequestWebView extends FormRequest
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

    public function messages()
    {
        return [
            'passport_number.max' => 'Nomor Paspor tidak boleh lebih dari 8 karakter.',
            'passport_number_verification.unique' => 'Nomor Paspor sudah terdaftar di dalam database.',
            'id_number.min' => 'Nomor KTP (NIK) harus minimal 16 karakter.',
            'id_number.max' => 'Nomor KTP (NIK) tidak boleh lebih dari 16 karakter.',
            'id_number_verification.unique' => 'Nomor KTP (NIK) sudah terdaftar di dalam database.',
            'id_number.integer' => 'Nomor KTP (NIK) harus berupa bilangan bulat/angka.
Contoh: *Nomor KTP (NIK): 1234567890123456*',
            'customer_photo' => [
                'nullable' => 'Foto pelanggan harus berupa file gambar.',
                'image' => 'Foto pelanggan harus berupa file gambar.',
                'max' => 'Ukuran foto pelanggan tidak boleh lebih dari 2048 kilobita (2 MB).',
                'file' => 'Foto pelanggan harus berupa file.',
                'mimes' => 'Foto pelanggan harus berformat PNG atau JPG.',
            ],
            'passport_photo' => [
                'nullable' => 'Foto paspor harus berupa file gambar.',
                'image' => 'Foto paspor harus berupa file gambar.',
                'max' => 'Ukuran foto paspor tidak boleh lebih dari 2048 kilobita (2 MB).',
                'file' => 'Foto paspor harus berupa file.',
                'mimes' => 'Foto paspor harus berformat PNG atau JPG.',
            ],
            'id_photo' => [
                'nullable' => 'Foto KTP harus berupa file gambar.',
                'image' => 'Foto KTP harus berupa file gambar.',
                'max' => 'Ukuran foto KTP tidak boleh lebih dari 2048 kilobita (2 MB).',
                'file' => 'Foto KTP harus berupa file.',
                'mimes' => 'Foto KTP harus berformat PNG atau JPG.',
            ],
            'birth_certificate_photo' => [
                'nullable' => 'Foto akta kelahiran harus berupa file gambar.',
                'image' => 'Foto akta kelahiran harus berupa file gambar.',
                'max' => 'Ukuran foto akta kelahiran tidak boleh lebih dari 2048 kilobita (2 MB).',
                'file' => 'Foto akta kelahiran harus berupa file.',
                'mimes' => 'Foto akta kelahiran harus berformat PNG atau JPG.',
            ],
            'family_card_photo' => [
                'nullable' => 'Foto kartu keluarga harus berupa file gambar.',
                'image' => 'Foto kartu keluarga harus berupa file gambar.',
                'max' => 'Ukuran foto kartu keluarga tidak boleh lebih dari 2048 kilobita (2 MB).',
                'file' => 'Foto kartu keluarga harus berupa file.',
                'mimes' => 'Foto kartu keluarga harus berformat PNG atau JPG.',
            ],

        ];
    }
}
