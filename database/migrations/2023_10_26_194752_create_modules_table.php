<?php

use Illuminate\Database\Migrations\Migration; 
use Illuminate\Database\Schema\Blueprint;  
use Illuminate\Support\Facades\Schema; 

/**
 * @todo: Add comments to explain what this class is for
 */

return new class extends Migration
{
    /**
     * @todo: Add comments to explain what the up() function is for
     * 
     * @todo: Which artisan commands will call this function?
     * 
     * @todo: Why is this class's name prefixed with a number?
     */
    public function up(): void
    {

        // @todo: what does Schema::create do?
        // @todo: what parameters does it accept?
        Schema::create('modules', function (Blueprint $table) {
            // @todo: comment each line of this function, explaining what it does, what type of data it will store, and whether it is required by the Laravel and the Eloquent ORM
            $table->id();
            $table->timestamps(); 
            $table->string('modulename'); 
            $table->string('modulecode'); 
            $table->string('maxstudents'); 
        });
    }

    /**
     * @todo: Add comments to explain what the down() function is for.
     * @todo: Which artisan commands will call this function?
     */
    public function down(): void
    {
        //@todo: what does Schema::dropIfExists do? What parameters does it accept?
        Schema::dropIfExists('modules');
    }
};
