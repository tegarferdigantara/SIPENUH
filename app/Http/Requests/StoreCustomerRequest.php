<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCustomerRequest extends FormRequest
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
            'whatsapp_number_sender' => 'required|string|max:20',
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
            'full_name.required' => 'Kolom [Nama Lengkap] pada Pendaftaran Umrah Wajib diisi. Contoh: *Nama Lengkap: Fulan Fulanah*',
            'gender.required' => 'Kolom [Jenis Kelamin] pada Pendaftaran Umrah Wajib diisi. Contoh: *Jenis Kelamin: Laki-laki*',
            'birth_place.required' => 'Kolom [Tempat Lahir] pada Pendaftaran Umrah Wajib diisi. Contoh: *Tempat Lahir: Jakarta*',
            'birth_date.required' => 'Kolom [Tanggal Lahir] pada Pendaftaran Umrah Wajib diisi. Contoh: *Tanggal Lahir: 24 September 2001*',
            'father_name.required' => 'Kolom [Nama Ayah] pada Pendaftaran Umrah Wajib diisi. Contoh: *Nama Ayah: Fulan*',
            'mother_name.required' => 'Kolom [Nama Ibu] pada Pendaftaran Umrah Wajib diisi. Contoh: *Nama Ibu: Fulanah*',
            'profession.required' => 'Kolom [Pekerjaan] pada Pendaftaran Umrah Wajib diisi. Contoh: *Pekerjaan: Pelajar*',
            'address.required' => 'Kolom [Alamat] pada Pendaftaran Umrah Wajib diisi. Contoh: *Alamat: Jl. Contoh No. 1*',
            'province.required' => 'Kolom [Provinsi] pada Pendaftaran Umrah Wajib diisi. Contoh: *Provinsi: DKI Jakarta*',
            'city.required' => 'Kolom [Kota] pada Pendaftaran Umrah Wajib diisi. Contoh: *Kota: Jakarta*',
            'subdistrict.required' => 'Kolom [Kecamatan] pada Pendaftaran Umrah Wajib diisi. Contoh: *Kecamatan: Cilandak*',
            'umrah_package_id.required' => 'Kolom [Kode Paket Umrah] pada Pendaftaran Umrah Wajib diisi dan berupa Angka. *Contoh: Kode Paket Umrah: 20*',
            //Birth Date Validation
            'birth_date.date_format' => 'Kolom [Tanggal Lahir] harus sesuai dengan format. Contoh: *24 September 2001*.',
            //WhatsApp Number Validation
            'whatsapp_number.required' => 'Kolom [Nomor HP (WhatsApp)] pada Pendaftaran Umrah Wajib diisi. Contoh: *Nomor HP (WhatsApp): 081234567890*',
            'whatsapp_number.integer' => 'Nomor HP (WhatsApp) harus berupa bilangan bulat/angka.',
            'whatsapp_number.regex' => 'Nomor HP (WhatsApp) harus dimulai dengan 08 dan memiliki panjang antara 10 hingga 13 digit setelah 08.',
        ];
    }
}
