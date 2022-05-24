<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Professor>
 */
class ProfessorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'professor_id' => $this->faker->numerify('####'),
            'first_name' => $this->faker->firstName,
            'second_name' => $this->faker->lastName,
            'third_name' => $this->faker->lastName,
            'professor_email' => $this->faker->unique()->email,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'city' => $this->faker->city,
            'department' => $this->faker->word,
        ];
    }
}
