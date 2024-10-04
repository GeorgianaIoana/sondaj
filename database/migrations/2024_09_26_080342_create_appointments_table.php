<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();

            $table->dateTime('date');
            $table->string('status')->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
