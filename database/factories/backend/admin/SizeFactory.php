<?php

namespace Database\Factories\backend\admin;

use Illuminate\Database\Eloquent\Factories\Factory;

class SizeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'size' => $this->faker->word,
            'status' => $this->faker->randomElement(['active','inactive']),
        ];
    }
}
