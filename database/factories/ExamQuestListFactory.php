<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExamQuestList>
 */
class ExamQuestListFactory extends Factory
{
   /**
    * Define the model's default state.
    *
    * @return array<string, mixed>
    */
   public function definition(): array
   {
      return [
         'exam_id' => fake()->numberBetween(1, 10),
         'question_id' => fake()->numberBetween(1, 10),
         'is_correct' => fake()->boolean(),
      ];
   }
}
