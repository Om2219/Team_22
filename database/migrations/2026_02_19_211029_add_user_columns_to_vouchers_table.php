<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void
    {
        Schema::table('vouchers', function (Blueprint $table){
            if(!Schema::hasColumn('vouchers', 'user_id')){
            $table->foreignId('user_id')
            ->nullable()
            ->after('id')
            ->constrained()
            ->nullOnDelete();
            }


            if(!Schema::hasColumn('vouchers', 'used_at')){
            $table->timestamp('used_at')
            ->nullable()
            ->after('active');
        }
        });
        
    }


    public function down(): void{
        Schema::table('vouchers', function (Blueprint $table){
        if(Schema::hasColumn('vouchers','user_id')){
            try
            {
                $table->dropConstrainedForeignId('user_id');
            }
            catch(\Throwable $e){
                $table->dropColumn('user_id');
            }
        }
        
        if(Schema::hasColumn('vouchers', 'used_at')){
            $table->dropColumn('used_at');
        }
           
        });
    }
};
