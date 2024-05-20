<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConsumerDocumentsRequest extends FormRequest
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
            // 'id' => ['required'],
            // 'consumer_id' => ['required'],
            'consumer_photo' => ['nullable', 'image', 'max:2048', 'file', 'mimes:png,jpg'],
            'passport_number' => ['nullable', 'string', 'max:8'],
            'passport_photo' => ['nullable', 'image', 'max:2048', 'file', 'mimes:png,jpg'],
            'id_number' => ['nullable', 'string', 'max:16', 'min:16'],
            'id_photo' => ['nullable', 'image', 'max:2048', 'file', 'mimes:png,jpg'],
            'birth_certificate_photo' => ['nullable', 'image', 'max:2048', 'file', 'mimes:png,jpg'],
            'family_card_photo' => ['nullable', 'image', 'max:2048', 'file', 'mimes:png,jpg'],
        ];
    }
}
