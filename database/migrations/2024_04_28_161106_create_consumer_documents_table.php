<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('consumer_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consumer_id');
            $table->string('consumer_photo', 255)->nullable();
            $table->string('passport_number', 8)->unique()->nullable();
            $table->string('passport_photo', 255)->nullable();
            $table->string('id_number', 16)->unique()->nullable();
            $table->string('id_photo', 255)->nullable();
            $table->string('birth_certificate_photo', 255)->nullable();
            $table->string('family_card_photo', 255)->nullable();
            $table->timestamps();

            $table->foreign('consumer_id')->on('consumers')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consumer_documents');
    }
};
