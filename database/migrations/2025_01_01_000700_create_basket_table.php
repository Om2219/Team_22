<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('basket', function (Blueprint $table) {
            $table->id();
            /*$table->foreignId('user_id')->constrained('users')->cascadeOnDelete();*/            //don't need right now, can come back later
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->integer('quantity')->default(1);
            $table->timestamp('created_when')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('basket');
    }
};
