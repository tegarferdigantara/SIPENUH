<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItineraryResource extends JsonResource
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
            'umrah_package_id' => $this->umrah_package_id,
            'umrah_package_name' => $this->umrahPackage->name,
            'title' => $this->title,
            'date' => $this->date,
            'activity' => $this->activity
        ];
    }
}
