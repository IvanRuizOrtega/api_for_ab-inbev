<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sku' => strtoupper($this->faker->unique()->realTextBetween(3, 10)),
            'name' => $this->faker->unique()->name,
            'description' => $this->faker->text,
            'path_image' => $this->faker->imageUrl,
            'price' => $this->faker->randomDigit(),
            'iva' => $this->faker->boolean,
            'is_active' => $this->faker->boolean,
            'stock' => $this->faker->numberBetween(1, 4)
        ];
    }
}
