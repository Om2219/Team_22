<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void
    {
        Schema::table('vouchers', function (Blueprint $table){
            $table->foreignId('user_id')->nullable()->after('id')->constrained()->nullOnDelete();
            $table->timestamp('used_at')->nullable()->after('active');
        });
    }
    public function down(): void{
        Schema::table('vouchers', function (Blueprint $table){
            $table->dropConstrainedForeignId('user_id');
            $table->dropColumn('used_at');
        });
    }
};