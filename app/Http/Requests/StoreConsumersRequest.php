<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreConsumersRequest extends FormRequest
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
            'full_name' => ['required', 'string', 'max:255'],
            'whatsapp_number' => ['required', 'string', 'max:20'],
            'gender' => ['required', 'string', 'max:10'],
            'birth_place' => ['required', 'string', 'max:50'],
            'birth_date' => ['required'],
            'father_name' => ['required', 'string', 'max:255'],
            'mother_name' => ['required', 'string', 'max:255'],
            'profession' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'subdistrict' => ['required', 'string', 'max:255'],
            'family_number' => ['nullable', 'max:20'],
            'email' => ['nullable', 'string', 'max:255'],
            'umrah_package_id' => ['required'],
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response([
            "errors" => $validator->getMessageBag()
        ], 400));
    }

    public function messages()
    {
        return [
            'full_name.required' => 'Kolom [Nama Lengkap] pada Pendaftaran Umrah Wajib diisi.',
            'gender.required' => 'Kolom [Jenis Kelamin] pada Pendaftaran Umrah Wajib diisi.',
            'birth_place.required' => 'Kolom [Tempat, Tanggal Lahir] pada Pendaftaran Umrah Wajib diisi.',
            'birth_date.required' => 'Kolom [Tempat, Tanggal Lahir] pada Pendaftaran Umrah Wajib diisi.',
            'father_name.required' => 'Kolom [Nama Ayah] pada Pendaftaran Umrah Wajib diisi.',
            'mother_name.required' => 'Kolom [Nama Ibu] pada Pendaftaran Umrah Wajib diisi.',
            'profession.required' => 'Kolom [Pekerjaan] pada Pendaftaran Umrah Wajib diisi.',
            'address.required' => 'Kolom [Alamat] pada Pendaftaran Umrah Wajib diisi.',
            'province.required' => 'Kolom [Provinsi] pada Pendaftaran Umrah Wajib diisi.',
            'city.required' => 'Kolom [Kota] pada Pendaftaran Umrah Wajib diisi.',
            'subdistrict.required' => 'Kolom [Kecamatan] pada Pendaftaran Umrah Wajib diisi.',
            'umrah_package_id.required' => 'Kolom [Jenis Paket Umrah] pada Pendaftaran Umrah Wajib diisi.',
        ];
    }
}
