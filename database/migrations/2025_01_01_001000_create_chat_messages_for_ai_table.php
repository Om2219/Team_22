<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chat_messages_for_ai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('session_id')->constrained('chat_sessions_for_ai')->cascadeOnDelete();
            $table->enum('sender',['user','bot']);
            $table->text('message');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chat_messages_for_ai');
    }
};
