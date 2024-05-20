<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatbotApiKey extends Model
{
    use HasFactory;

    protected $table = 'chatbot_api_keys';

    protected $fillable = [
        'api_key',
        'description'
    ];
    protected $keyType = 'int';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
}
