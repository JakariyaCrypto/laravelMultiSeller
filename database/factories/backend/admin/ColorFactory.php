<?php

namespace Database\Factories\backend\admin;

use Illuminate\Database\Eloquent\Factories\Factory;

class ColorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'color' => $this->faker->word,
            'status' => $this->faker->randomElement(['active','inactive'])
        ];
    }
}
