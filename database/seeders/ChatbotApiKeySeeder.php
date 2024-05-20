<?php

namespace Database\Seeders;

use App\Models\ChatbotApiKey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ChatbotApiKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ChatbotApiKey::create([
            'api_key' => Str::random(64),
            'description' => 'Ini merupakan Authorization Key yang digunakan Whatsapp Chatbot SIPENUH'
        ]);
    }
}
