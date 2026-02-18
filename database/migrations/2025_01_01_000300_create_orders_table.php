<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('order_ref')->unique();
            $table->decimal('total',10,2)->default(0);
            // $table->decimal('price',10,2)->default(0); not needed we do the total can readd later
            $table->text('address_line_1');
            $table->text('address_line_2')->nullable();
            $table->string('postcode', 20);
            $table->string('city', 100);
            
            $table->string('card_number', 20);
            $table->string('expiry_month', 2);
            $table->string('expiry_year', 4);
            
            $table->timestamp('created_when')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
