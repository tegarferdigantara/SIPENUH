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
        Schema::create('customer_audit_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('old_customer_id');
            $table->string('full_name');
            $table->string('whatsapp_number');
            $table->string('action'); // Contoh: 'deleted', 'updated', 'created'
            $table->json('old_data')->nullable(); // Data sebelum perubahan (opsional)
            $table->unsignedBigInteger('old_umrah_package_id');
            $table->timestamps();

            $table->foreign('old_umrah_package_id')->references('id')->on('umrah_packages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_audit_logs');
    }
};
