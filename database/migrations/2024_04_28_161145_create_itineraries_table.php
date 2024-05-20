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
        Schema::create('itineraries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('umrah_package_id')->nullable(false);
            $table->date('itinerary_date')->nullable();
            $table->text('activity')->nullable();
            $table->unsignedBigInteger('user_creator_id')->nullable(false);
            $table->timestamps();

            $table->foreign('umrah_package_id')->on('umrah_packages')->references('id');
            $table->foreign('user_creator_id')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itineraries');
    }
};
