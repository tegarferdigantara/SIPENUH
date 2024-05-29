<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $fillable = [
        'role_name'
    ];
    public $timestamps = false;

    public function userRole(): HasMany
    {
        return $this->hasMany(UserRole::class, 'role_id', 'id');
    }
}
