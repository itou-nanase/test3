<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class WeightLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date(),
        'weight' => $this->faker->randomFloat(1, 50, 100),
        'calories' => $this->faker->numberBetween(1000, 3000),
        'exercise_time' => $this->faker->numberBetween(0, 120),
        'exercise_content' => $this->faker->randomElement   ([
            'ランニング', '筋トレ', 'ウォーキング', 'ヨガ'
            ]),
        ];
    }
}
