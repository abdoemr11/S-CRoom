<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\bonus>
 */
class BonusFactory extends Factory
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
          'bonus_id'    =>12                   ,
          'student_id'  =>students  ::factory(),
          'professor_id'=>professor ::factory(),
          'lecture_id'  =>professor ::factory(),
          'bonus_value' =>19
      ];
    }
}
