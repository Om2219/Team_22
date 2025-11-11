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
     * @todo: Which artisan commands will call this function?
     */
    public function up(): void
    {

        // @todo: what does Schema::create do?
        // @todo: what parameters does it accept?
        Schema::create('students', function (Blueprint $table) {
            // @todo comment each line of this function, explaining what it does, what type of data it will store, and whether it is required by the Laravel and the Eloquent ORM
            $table->id(); 
            $table->timestamps(); 
            $table->string('firstname'); 
            $table->string('surname'); 
            $table->string('studentnumber'); 
            $table->string('email'); 
            $table->string('dob'); 
        });
    }

    /**
     * @todo: Add comments to explain what the down() function is for
     * 
     * @todo: Which artisan commands will call this function?
     */
    public function down(): void
    {
        // @todo: what does Schema::dropIfExists do? What parameters does it accept?
        Schema::dropIfExists('students');
    }
};
