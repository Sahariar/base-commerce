<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product_variant>
 */
class ProductVariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sizes = ['S', 'M', 'L', 'XL', 'XXL'];
        $colors = ['Red', 'Blue', 'Green', 'Black', 'White', 'Yellow'];
        return [
        //
        'sku' => Str::random(10),
        'size' => $this->faker->randomElement($sizes),
        'color' => $this->faker->randomElement($colors),
        'price' => $this->faker->randomFloat(2, 10, 999), // 2 decimal places, between 10 and 999
        'stock' => $this->faker->numberBetween(0, 1000),
        'product_id' => Product::factory(),
        ];
    }
}
