<?php

namespace Database\Factories;

use App\Models\lecture;
use App\Models\subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\lecture>
 */
class LectureFactory extends Factory
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
            'lectures_id' =>12,
            'subjects_id'  =>subject  ::factory(),
            'professor_id'=>professor ::factory(),
            'lecture_id'  =>lecture   ::factory(),
            'bonus_value' =>19

        ];
    }
}
