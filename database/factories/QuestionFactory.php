<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\question>
 */
class QuestionFactory extends Factory
{
   /**
    * Define the model's default state.
    *
    * @return array<string, mixed>
    */
   public function definition(): array
   {
      return [
         'question' => fake()->text(),
         'category' => fake()->randomElement(['Numeric', 'Verbal', 'Logic']),
         'option_a' => fake()->word(),
         'option_b' => fake()->word(),
         'option_c' => fake()->word(),
         'option_d' => fake()->word(),
         'key' => fake()->randomElement(['a', 'b', 'c', 'd']),
      ];
   }
}
