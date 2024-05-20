<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UmrahPackageResource extends JsonResource
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
            'package_name' => $this->package_name,
            'description' => $this->description,
            'depature_date' => $this->depature_date,
            'duration' => $this->duration,
            'price' => $this->price,
            'facility' => $this->facility,
            'destination' => $this->destination,
            'quota' => $this->quota,
            'status' => $this->status,
            'image' => $this->image
        ];
    }
}
