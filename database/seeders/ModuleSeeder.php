<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Module;

// @todo: Add comments to explain what this class is for
// @todo: What artisan command was used to create this class?
// @todo: Should this class be used for development or production?

class ModuleSeeder extends Seeder
{
    /**
     * @todo: list four artisan commands that can be used to run this seeder.
     */

    // @todo: Add comments to explain what the run() function is for.
    public function run(): void
    {
        // @todo what do the following lines of code do?

        // @todo what does DB::table('modules') do?
        // @todo what does the insert() method do? What parameters does it accept?
        DB::table('modules')->insert([
            'modulename' => 'Computational Intelligence',
            'modulecode' => 'CS3CI',
            'maxstudents' => '40',
            'optional' => '1',
        ]);
        DB::table('modules')->insert([
            'modulename' => 'Interaction Design',
            'modulecode' => 'CS3ID',
            'maxstudents' => '20',
            'optional' => '1',
        ]);
        DB::table('modules')->insert([
            'modulename' => 'Mobile Design and Development',
            'modulecode' => 'CS3SPM',
            'maxstudents' => '10',
            'optional' => '1',
        ]);
        DB::table('modules')->insert([
            'modulename' => 'Game Development',
            'modulecode' => 'CS3GD',
            'maxstudents' => '30',
            'optional' => '1',
        ]);
        DB::table('modules')->insert([
            'modulename' => 'Computer Animation',
            'modulecode' => 'CS3CA',
            'maxstudents' => '35',
            'optional' => '1',
        ]);
        DB::table('modules')->insert([
            'modulename' => 'Software Project Management',
            'modulecode' => 'CS3SPM',
            'maxstudents' => '50',
            'optional' => '0',
        ]);
        DB::table('modules')->insert([
            'modulename' => 'Individual Project',
            'modulecode' => 'CS3IP',
            'maxstudents' => '50',
            'optional' => '0',
        ]);

        // @todo: what is the purpose of this foreach loop?
        // @todo: what does it loop through?


        /**
         * -------------------------------------------------------------------------------------------
         * !!!! NOTE FROM PREVIOUS DEVELOPER!!!!
         *  The below code throws an error when running the seeder.
         *  I think it has something to do with the many-to-many relationship between modules and students.
         *  I have commented it out for now, but it would be good to get it working. 
         *  -------------------------------------------------------------------------------------------
         */


        // As you can see, the following code is commented out because it throws an error.
        // Don't worry about fixing it for now, but leave comments explaining what it does.
        // @todo: Add comments to explain the purpose of the foreach loop below.
        // @todo: What does the if statement check for?
        // @todo: What is the purpose of the pluck() method? Why do we use it here? Why is the result stored in a variable?
        // @todo: What is the purpose of the else statement?
        // @todo: What is the purpose of the inRandomOrder(), take() and pluck() methods?
        // @todo: Why is the result stored in a variable?
        // @todo: What is the purpose of the attach() method?


        /** 
         * foreach(Module::all() as $module) {
         *    if($module->optional == 0){
         *        $students = \App\Models\Student::pluck('id')
         *    }else {
         *        $students = \App\Models\Student::inRandomOrder()->take(rand(10, 50))->pluck('id');
         *    } 
         *    $module->students()->attach($students);
         *}
         */
    }
}
