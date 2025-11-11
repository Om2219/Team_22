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
 * 
 * @todo: What is the difference between this class and the other migration classes?
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
        // @todo: what does Schema::create do? What parameters does it accept?
        Schema::create('module_student', function (Blueprint $table) {
            /** 
             * @todo Answer the following questions:
             * How does this function differ from the other up() functions?
             * What does the foreignId function do?
             * What does the constrained function do?
             * Is there a primary key on this table? If not, why not?
             * What is the purpose of this table?
             * What is the purpose of the module_id column?
             * What is the purpose of the student_id column?
            */ 
            $table->foreignId('module_id')->constrained(); 
            $table->foreignId('student_id')->constrained(); 
        });
    }

    /**
    * @todo: Add comments to explain what the down() function is for.
    * @todo: Which artisan commands will call this function?
    */
    public function down(): void
    {
        // @todo: what does Schema::dropIfExists do? What parameters does it accept?
        Schema::dropIfExists('module_student');
    }
};
