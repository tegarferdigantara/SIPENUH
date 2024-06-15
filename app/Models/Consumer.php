<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Consumer extends Model
{
    use HasFactory;

    protected $table = 'consumers';
    protected $keyType = 'int';
    protected $primaryKey = 'id';
    protected $fillable = [
        'full_name',
        'whatsapp_number_sender',
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
        'umrah_package_id'
    ];
    public $timestamps = false;
    public $incrementing = true;


    public function consumerDocument(): HasOne
    {
        return $this->hasOne(ConsumerDocument::class, 'consumer_id', 'id');
    }

    public function umrahPackage(): BelongsTo
    {
        return $this->belongsTo(UmrahPackage::class, 'umrah_package_id', 'id');
    }
}
