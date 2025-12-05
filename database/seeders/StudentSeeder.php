<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder; 


// @todo: Add comments to explain what this class is for
// @todo: What artisan command was used to create this class?
// @todo: Should this class be used for development or production?

class StudentSeeder extends Seeder // @todo: what is the Seeder class?
{
    /** 
     * @todo: list four artisan commands that can be used to run this seeder.
    */

    /**
     * @todo: Add comments to explain what the run() function is for.
     * @todo: Does this function define the data for each student record itself?
     */    
    public function run(): void
    {
        // @todo: what does the factory() method do?
        // @todo: what does the count() method do?
        // @todo: what does the create() method do?
        // @todo: how many student records will be created?
        \App\Models\Student::factory()->count(50)->create();
    }
}
