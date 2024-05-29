<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreConsumerRequest extends FormRequest
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
            'whatsapp_number' => 'required|string|max:20',
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
        ];
    }
    protected function prepareForValidation()
    {
        if ($this->birth_date) {
            try {
                $this->merge([
                    'full_name' => $this->titleCase($this->full_name),
                    'gender' => $this->titleCase($this->gender),
                    'birth_place' => $this->titleCase($this->birth_place),
                    'father_name' => $this->titleCase($this->father_name),
                    'mother_name' => $this->titleCase($this->mother_name),
                    'profession' => $this->titleCase($this->profession),
                    'address' => $this->titleCase($this->address),
                    'province' => $this->titleCase($this->province),
                    'city' => $this->titleCase($this->city),
                    'subdistrict' => $this->titleCase($this->subdistrict),
                    'birth_date' => Carbon::parse($this->birth_date)->format('Y-m-d'),
                ]);
            } catch (\Exception $e) {
                // Jika parsing gagal, biarkan input tidak berubah untuk validasi error nanti
            }
        }
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response([
            "errors" => $validator->getMessageBag()
        ], 422));
    }

    private function titleCase($value)
    {
        return ucwords(strtolower($value));
    }
    public function messages()
    {
        return [
            'full_name.required' => 'Kolom [Nama Lengkap] pada Pendaftaran Umrah Wajib diisi.',
            'gender.required' => 'Kolom [Jenis Kelamin] pada Pendaftaran Umrah Wajib diisi.',
            'birth_place.required' => 'Kolom [Tempat Lahir] pada Pendaftaran Umrah Wajib diisi.',
            'birth_date.required' => 'Kolom [Tanggal Lahir] pada Pendaftaran Umrah Wajib diisi.',
            'father_name.required' => 'Kolom [Nama Ayah] pada Pendaftaran Umrah Wajib diisi.',
            'mother_name.required' => 'Kolom [Nama Ibu] pada Pendaftaran Umrah Wajib diisi.',
            'profession.required' => 'Kolom [Pekerjaan] pada Pendaftaran Umrah Wajib diisi.',
            'address.required' => 'Kolom [Alamat] pada Pendaftaran Umrah Wajib diisi.',
            'province.required' => 'Kolom [Provinsi] pada Pendaftaran Umrah Wajib diisi.',
            'city.required' => 'Kolom [Kota] pada Pendaftaran Umrah Wajib diisi.',
            'subdistrict.required' => 'Kolom [Kecamatan] pada Pendaftaran Umrah Wajib diisi.',
            'umrah_package_id.required' => 'Kolom [Jenis Paket Umrah] pada Pendaftaran Umrah Wajib diisi dan berupa Angka. Contoh: Jenis Paket Umrah: 20',
            //Date Format
            'birth_date.date_format' => 'Kolom [Tanggal Lahir] harus sesuai dengan format. Contoh: *24 September 2001*.'
        ];
    }
}
