<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserRole extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserRole::class, 'user_id', 'id');
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(UserRole::class, 'role_id', 'id');
    }
}
