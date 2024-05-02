<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ConsumerDocuments extends Model
{
    use HasFactory;

    public function Consumers(): BelongsTo
    {
        return $this->belongsTo(Consumers::class, 'consumer_id', 'id');
    }
}
