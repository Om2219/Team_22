<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->text('product_description')->nullable();
            $table->decimal('price',10,2);
            $table->timestamps();
            //$table->string('brand')->nullable();
            //$table->integer('product_stock')->default(0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
