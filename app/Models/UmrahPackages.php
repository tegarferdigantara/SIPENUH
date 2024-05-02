<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UmrahPackages extends Model
{
    use HasFactory;

    public function consumers(): HasOne
    {
        return $this->hasOne(Consumers::class, 'umrah_package_id', 'id');
    }

    public function itineraries(): HasMany
    {
        return $this->hasMany(Itineraries::class, 'umrah_package_id', 'id');
    }
}
