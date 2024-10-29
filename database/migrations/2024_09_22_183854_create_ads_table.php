<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);  // 255 belgidan oshmasligini ta’minlash uchun o‘lcham belgilash
            $table->text('description');   // uzunroq matn uchun 'text' tipini ishlatish
            $table->float('price');
            $table->integer('rooms');
            $table->string('address');     // uzunroq manzil uchun ham 'text' ishlatish mumkin
            $table->enum('gender', ['male', 'female']);
            $table->foreignId('user_id')->constrained();
            $table->foreignId('branch_id')->constrained();
            $table->foreignId('status_id')->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
