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
        'name'
    ];
    public $timestamps = false;

    public function users(): HasMany
    {
        return $this->hasMany(User::class); // Mengubah relasi menjadi HasMany, karena satu peran (role) dapat dimiliki oleh banyak user
    }
}
