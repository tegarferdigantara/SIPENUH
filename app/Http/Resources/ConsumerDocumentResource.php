<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConsumerDocumentResource extends JsonResource
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
            'consumer_id' => $this->consumer_id,
            'consumer_photo' => $this->consumer_photo,
            'passport_number' => $this->passport_number,
            'passport_photo' => $this->passport_photo,
            'id_number' => $this->id_number,
            'id_photo' => $this->id_photo,
            'birth_certificate_photo' => $this->birth_certificate_photo,
            'family_card_photo' => $this->family_card_photo
        ];
    }
}
