<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('document_registries', function (Blueprint $table) {
            $table->id();
            $table->string('reference_number', 255)->unique();
            $table->date('out_date');
            $table->text('regarding');
            $table->text('recipient');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('user_creator_id');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('user_creator_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('document_registries');
    }
};
