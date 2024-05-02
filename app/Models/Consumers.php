<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Consumers extends Model
{
    use HasFactory;

    protected $table = 'consumers';
    protected $keyType = 'int';
    protected $primaryKey = 'id';
    protected $fillable = [
        'full_name',
        'whatsapp_number',
        'gender',
        'birth_place',
        'birth_date',
        'father_name',
        'mother_name',
        'profession',
        'address',
        'province',
        'city',
        'subdistrict',
        'family_number',
        'email',
        'umrah_package_id',
        'registration_date'

    ];
    public $timestamps = false;
    public $incrementing = true;


    public function consumerDocuments(): HasOne
    {
        return $this->hasOne(ConsumerDocuments::class, 'consumer_id', 'id');
    }

    public function umrahPackages(): BelongsTo
    {
        return $this->belongsTo(UmrahPackages::class, 'umrah_package_id', 'id');
    }
}
