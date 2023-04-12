<?php

namespace Database\Factories\backend\admin;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\backend\admin\Category;
use App\Models\backend\admin\Brand;
use App\Models\backend\admin\Color;
use App\Models\backend\admin\Size;
use App\Models\backend\admin\Product;
use App\Models\User;
use Illuminate\Support\Str;
class ProductFactory extends Factory
{
    protected $model = Product::class;
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
            'description' => $this->faker->paragraph,
            'return' => $this->faker->paragraph,
            'aditional' => $this->faker->paragraph,
            'stock' => $this->faker->numberBetween(2,10),
            'code' => $this->faker->numberBetween(5,10),
            'brand_id' => $this->faker->randomElement(Brand::pluck('id')->toArray()),
            'category_id' => $this->faker->randomElement(Category::pluck('id')->toArray()),
            'child_category_id' => $this->faker->randomElement(Category::pluck('id')->toArray()),
            'grand_child_category_id' => $this->faker->randomElement(Category::pluck('id')->toArray()),
            'price' => $this->faker->numberBetween(100,1000),
            'sell_price' => $this->faker->numberBetween(100,1000),
            'discount' => $this->faker->numberBetween(100,1000),
            'size_id' => $this->faker->randomElement(Size::pluck('id')->toArray()),
            'color_id' => $this->faker->randomElement(Color::pluck('id')->toArray()),
            'qty' => $this->faker->numberBetween(2,10),
            'added_by_id' => '1',
            'photo' => $this->faker->imageUrl(400,250),
            'condition' => $this->faker->randomElement(['new','feature','best-seller']),
            'status' => $this->faker->randomElement(['active','inactive']),
        ];
    }
}
