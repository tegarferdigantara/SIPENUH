<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerDocument extends Model
{
    use HasFactory;

    protected $table = 'customer_documents';
    protected $fillable = [
        'customer_id',
        'umrah_package_id',
        'customer_photo',
        'passport_number',
        'passport_photo',
        'id_number',
        'id_photo',
        'birth_certificate_photo',
        'family_card_photo',
    ];
    protected $keyType = 'int';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
