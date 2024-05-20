<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ConsumerDocuments extends Model
{
    use HasFactory;

    protected $table = 'consumer_documents';
    protected $fillable = [
        'consumer_id',
        'consumer_photo',
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

    public function Consumers(): BelongsTo
    {
        return $this->belongsTo(Consumers::class, 'consumer_id', 'id');
    }
}
