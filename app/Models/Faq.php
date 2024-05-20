<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $table = 'faqs';
    protected $fillable = [
        'question',
        'answer',
        'user_creator_id'
    ];
    protected $keyType = 'int';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_creator_id');
    }
}
