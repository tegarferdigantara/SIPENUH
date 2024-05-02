<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Roles extends Model
{
    use HasFactory;

    protected $table = 'roles';

    public function userRoles(): HasMany
    {
        return $this->hasMany(UserRoles::class, 'roles_id', 'id');
    }
}
