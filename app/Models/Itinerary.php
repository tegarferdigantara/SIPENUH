<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Itinerary extends Model
{
    use HasFactory;

    protected $table = 'itineraries';
    protected $fillable = [
        'umrah_package_id',
        'itinerary_date',
        'activity',
        'user_creator_id'
    ];
    protected $keyType = 'int';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;

    public function umrahPackage(): BelongsTo
    {
        return $this->belongsTo(UmrahPackage::class, 'umrah_package_id', 'id');
    }
}
