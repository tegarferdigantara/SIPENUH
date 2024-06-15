<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConsumerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'whatsapp_number_sender' => $this->whatsapp_number_sender,
            'whatsapp_number' => $this->whatsapp_number,
            'gender' => $this->gender,
            'birth_place' => $this->birth_place,
            'birth_date' => $this->birth_date,
            'father_name' => $this->father_name,
            'mother_name' => $this->mother_name,
            'profession' => $this->profession,
            'address' => $this->address,
            'province' => $this->province,
            'city' => $this->city,
            'subdistrict' => $this->subdistrict,
            'family_number' => $this->family_number,
            'email' => $this->email,
            'umrah_package_id' => $this->umrah_package_id,
            'registration_number' => $this->registration_number
        ];
    }
}
