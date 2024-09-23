<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->string('title');     
            $table->longText('description') ->nullable();     
            $table->dateTime('finished_at', precision: 0)->nullable();
            $table->boolean('done')->default(false);
            $table->timestamps();   
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->text('body');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}