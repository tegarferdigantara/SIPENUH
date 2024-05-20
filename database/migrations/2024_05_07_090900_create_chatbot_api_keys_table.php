<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chatbot_api_keys', function (Blueprint $table) {
            $table->id();
            $table->string('api_key', 255)->nullable(false);
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Artisan::call('db:seed', [
            '--class' => 'ChatbotApiKeySeeder'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chatbot_api_keys');
    }
};
