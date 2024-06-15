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
        Schema::create('consumers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 255)->nullable(false);
            $table->string('whatsapp_number_sender', 20)->nullable(false);
            $table->string('whatsapp_number', 20)->nullable(false);
            $table->string('gender', 10)->nullable(false);
            $table->string('birth_place', 50)->nullable(false);
            $table->date('birth_date')->nullable(false);
            $table->string('father_name', 255)->nullable(false);
            $table->string('mother_name', 255)->nullable(false);
            $table->string('profession', 255)->nullable(false);
            $table->string('address', 255)->nullable(false);
            $table->string('province', 255)->nullable(false);
            $table->string('city', 255)->nullable(false);
            $table->string('subdistrict', 255)->nullable(false);
            $table->string('family_number', 20)->nullable();
            $table->string('email', 255)->nullable();
            $table->unsignedBigInteger('umrah_package_id');
            $table->string('registration_number', 50)->unique()->nullable(false);
            $table->timestamps();

            $table->foreign('umrah_package_id')->on('umrah_packages')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consumers');
    }
};
