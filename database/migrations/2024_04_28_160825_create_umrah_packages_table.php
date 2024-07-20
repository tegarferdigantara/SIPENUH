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
        Schema::create('umrah_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->unique()->nullable(false);
            $table->text('description')->nullable(false);
            $table->date('departure_date')->nullable(false);
            $table->integer('duration')->nullable(false);
            $table->integer('price')->nullable(false);
            $table->text('facility')->nullable(false);
            $table->text('destination')->nullable(false);
            $table->integer('quota')->nullable(false);
            $table->enum('status', ['ACTIVE', 'FULL', 'CLOSED'])->nullable(false);
            $table->unsignedBigInteger('user_creator_id')->nullable();
            $table->timestamps();

            $table->foreign('user_creator_id')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umrah_packages');
    }
};
