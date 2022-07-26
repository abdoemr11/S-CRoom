<?php

namespace Database\Factories;

use App\Models\Professor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $ss = ['Communication', 'Algorithms', 'Data-Structures', 'Antenna', 'Logic'];

        return [
            'professor_id'=>100,
            'subject_degree' => 100,
            'subject_year' =>4,
            'subject_min_mark' => 50,
            'subject_name' => $ss[rand(0,5)]


        ];
    }
}
