<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exam>
 */
class ExamFactory extends Factory
{
   /**
    * Define the model's default state.
    *
    * @return array<string, mixed>
    */
   public function definition(): array
   {
      return [
        'user_id' => fake()->numberBetween(1,10),
        'score_numeric' => fake()->numberBetween(1,100),
        'score_verbal' => fake()->numberBetween(1,100),
        'score_logic' => fake()->numberBetween(1,100),
        'status_numeric' => fake()->randomElement(['start', 'done']),
        'status_verbal' => randomElement(['start', 'done']),
        'status_logic' => randomElement(['start', 'done']),
        'timer_numeric' => fake()->numberBetween(1, 100),
        'timer_verbal' => fake()->numberBetween(1, 100),
        'timer_logic' => fake()->numberBetween(1, 100),
        'result' => fake()->randomElement(['Success', 'Failed']),
      ];
   }
}
