<?php

// This factory is part of the Database\Factories namespace
namespace Database\Factories;

// This is the base Factory class that all factories extend
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 * 
 * @todo: Add comments. What is the the purpose of this class?
 * 
 * @todo: Should this class be used for development or production?
 * 
 * @todo: What artisan command was used to create this class?
 */
class StudentFactory extends Factory
{
    /**
     * @todo: Add comments. What is the purpose of the definition() function?
     * @todo: What is Faker? What is it used for? Is it part of Laravel?
     * @todo: Why do we use random data here?
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /** 
         * @todo: What is $this->faker? 
         * @todo: What is the unique() method used for?
         * @todo: What is the numberBetween() method used for?
         * @todo: why do we store the result in a variable?
        */
        $sun = $this->faker->unique()->numberBetween(180000000, 209999999);

        /**
         * @todo: The method returns an array of data in key-value pairs, but what does they represent?
         * @todo: Comment each key-value pair to explain what it represents.
         */ 
         

        return [
            'firstname' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'studentnumber' => $sun,
            'email' => $sun.'@aston.ac.uk',
            'dob' => $this->faker->dateTimeBetween('-30 years', '-20 years')->format('Y-m-d'),
        ];
    }
}
