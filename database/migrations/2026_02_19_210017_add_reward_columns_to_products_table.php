<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'is_reward')) {
                $table->boolean('is_reward')->default(false);
            }
            if (!Schema::hasColumn('products', 'points_cost')) {
                $table->integer('points_cost')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'is_reward')) {
                $table->dropColumn('is_reward');
            }
            if (Schema::hasColumn('products', 'points_cost')) {
                $table->dropColumn('points_cost');
            }
        });
    }
};
