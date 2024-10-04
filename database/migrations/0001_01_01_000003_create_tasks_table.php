<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();

            $table->string('title');
            $table->longText('description')->nullable();
            $table->dateTime('finished_at', precision: 0)->nullable();
            $table->boolean('done')->default(false);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
