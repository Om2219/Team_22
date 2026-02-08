<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('title', 20)->nullable();
            $table->string('name')->nullable();

            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number',11)->nullable();

            $table->string('profile_picture_path')->nullable();

            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode', 20)->nullable();
            $table->string('country', 100)->nullable();

            $table->string('billing_address')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_postcode', 20)->nullable();
            $table->string('billing_country', 100)->nullable();

            $table->string('payment_method_type', 40)->nullable();
            $table->string('card_brand', 30)->nullable();
            $table->string('card_last_4', 4)->nullable();
            
            $table->timestamp('created_when')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
