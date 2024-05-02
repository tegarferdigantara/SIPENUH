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
            $table->string('package_name', 255)->nullable(false);
            $table->text('description')->nullable(false);
            $table->date('depature_date')->nullable(false);
            $table->integer('duration')->nullable(false);
            $table->integer('price')->nullable(false);
            $table->text('facility')->nullable(false);
            $table->text('destination')->nullable(false);
            $table->integer('quota')->nullable(false);
            $table->enum('status', ['ACTIVE', 'FULL', 'CLOSED'])->nullable(false);
            $table->string('image', 255)->nullable(false);
            $table->timestamps();
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
