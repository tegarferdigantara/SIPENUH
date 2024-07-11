<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\CustomerAuditLog;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
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
    public $timestamps = true;
    public $incrementing = true;
    public function customerDocument(): HasOne
    {
        return $this->hasOne(CustomerDocument::class, 'customer_id', 'id');
    }
    public function umrahPackage(): BelongsTo
    {
        return $this->belongsTo(UmrahPackage::class, 'umrah_package_id', 'id');
    }
    public function documentRegistry(): HasMany
    {
        return $this->hasMany(DocumentRegistry::class, 'customer_id', 'id');
    }
}
