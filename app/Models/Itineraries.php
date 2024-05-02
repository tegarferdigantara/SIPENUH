<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Itineraries extends Model
{
    use HasFactory;

    public function umrahPackages(): BelongsTo
    {
        return $this->belongsTo(UmrahPackages::class, 'umrah_package_id', 'id');
    }
}
