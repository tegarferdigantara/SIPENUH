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
        Schema::create('customer_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('customer_photo', 255)->nullable();
            $table->string('passport_number', 8)->nullable();
            $table->string('passport_photo', 255)->nullable();
            $table->string('id_number', 16)->nullable();
            $table->string('id_photo', 255)->nullable();
            $table->string('birth_certificate_photo', 255)->nullable();
            $table->string('family_card_photo', 255)->nullable();
            $table->string('id_number_verification', 255)->unique()->nullable();
            $table->string('passport_number_verification', 255)->unique()->nullable();

            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_documents');
    }
};
