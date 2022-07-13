<?php

namespace Database\Factories;

use App\Models\lecture;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\attendent>
 */
class AttendentFactory extends Factory
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

        'attendant_id'=> $this->faker->id(),
        'lecture_id'=> lecture::factory(),
        'is_attendant'=> true
        ];
    }
}
