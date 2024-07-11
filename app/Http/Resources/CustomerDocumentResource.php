<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerDocumentResource extends JsonResource
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
            'customer_id' => $this->customer_id,
            'customer_photo' => $this->customer_photo,
            'passport_number' => $this->passport_number,
            'passport_photo' => $this->passport_photo,
            'id_number' => $this->id_number,
            'id_photo' => $this->id_photo,
            'birth_certificate_photo' => $this->birth_certificate_photo,
            'family_card_photo' => $this->family_card_photo,
            'id_number_verification' => $this->id_number_verification,
            'passport_number_verification' => $this->passport_number_verification,
        ];
    }
}
