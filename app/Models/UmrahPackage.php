<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UmrahPackage extends Model
{
    use HasFactory;


    protected $table = 'umrah_packages';
    protected $fillable = [
        'name',
        'description',
        'depature_date',
        'duration',
        'price',
        'facility',
        'destination',
        'quota',
        'status',
        'image',
        'user_creator_id'
    ];
    protected $keyType = 'int';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;

    public function customers(): HasOne
    {
        return $this->hasOne(Customer::class, 'umrah_package_id', 'id');
    }

    public function itinerary(): HasMany
    {
        return $this->hasMany(Itinerary::class, 'umrah_package_id', 'id');
    }
    public function customerAuditLogs(): HasMany
    {
        return $this->hasMany(CustomerAuditLog::class, 'old_umrah_package_id', 'id');
    }
}
