<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return
        [
            'student_id' =>$this->faker->randomNumber(3),
            'national_id' => $this->faker->numerify('###########'),
            'first_name'=> $this->faker->firstName,
            'second_name'=> $this->faker->lastName,
            'third_name'=> $this->faker->lastName,
            'fourth_name' => $this->faker->lastName,
            'current_year' => $this->faker->year,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'email' => $this->faker->unique()->safeEmail(),
            'city' => $this->faker->city,
            'governorate' => $this->faker->city,
            'phone' => $this->faker->phoneNumber(),
            'image_auth'=> $this->faker->numerify('####')


        ];
    }
}
