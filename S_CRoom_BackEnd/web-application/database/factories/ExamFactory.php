<?php

namespace Database\Factories;

use App\Models\subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\exam>
 */
class ExamFactory extends Factory
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
            'exams_id'=>12,
            'student_id'  =>students  ::factory(),
            'professor_id'=>professor ::factory(),
            'subjects_id' =>subject   ::factory(),
            'bonus_value' =>19
        ];
    }
}
