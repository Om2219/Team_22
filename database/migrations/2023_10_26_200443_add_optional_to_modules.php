<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * @todo: Add comments to explain what this class is for
 * 
 * @todo: What artisan command was used to create this class?
 * 
 * @todo: Why is this class's name prefixed with a number?
 */

return new class extends Migration
{
    /**
     * @todo: Add comments to explain what the up() function is for
     * 
     * @todo: Which artisan commands will call this function?
     */
    public function up(): void
    {
        // @todo: what does Schema::table do?
        // @todo: what parameters does it accept?
        Schema::table('modules', function (Blueprint $table) {
            
            $table->boolean('optional')->default(false); //@todo: what does this line do? What type of data will it store? 
        });
    }

    /**
     * @todo: Add comments to explain what the down() function is for.
     * 
     * @todo: Which artisan commands will call this function?
     */
    public function down(): void
    {
        // @todo: what does Schema::table do? What parameters does it accept?
        // @todo: what does dropColumn do? What parameters does it accept?
        Schema::table('modules', function (Blueprint $table) {
            $table->dropColumn('optional');
        });
    }
};
