<?php

namespace Database\Factories\backend\admin;

use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'slug' => $this->faker->unique()->slug,
            'photo' => $this->faker->imageUrl('120','100'),
            'status' => $this->faker->randomElement(['active','inactive']),

        ];
    }
}
