<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DocumentRegistry extends Model
{
    use HasFactory;
    protected $table = 'document_registries';
    protected $keyType = 'int';
    protected $primaryKey = 'id';
    protected $fillable = [
        'reference_number',
        'out_date',
        'regarding',
        'user_creator_id'
    ];
    public $timestamps = true;
    public $incrementing = true;

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
