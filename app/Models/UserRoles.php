<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserRoles extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserRoles::class, 'user_id', 'id');
    }

    public function roles(): BelongsTo
    {
        return $this->belongsTo(UserRoles::class, 'roles_id', 'id');
    }
}
