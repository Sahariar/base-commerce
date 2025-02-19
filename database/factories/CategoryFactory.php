<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $parentCategory = Category::inRandomOrder()->first();
        $cateName = [
            'Eco-Friendly Home Goods',
            'Zero Waste Kitchen',
            'Sustainable Fashion',
            'Ethical Beauty Products',
            'Green Travel',
            'Organic Gardening',
            'Renewable Energy',
            'Composting and Waste Reduction',
            'DIY and Upcycling',
            'Sustainable Living Blogs and Resources'
        ];

        return [
            //
        'name' => $this->faker->unique()->randomElement($cateName),
        'slug' => fake()->unique()->slug(),
        'description' => fake()->sentence(),
        'image' => 'https://picsum.photos/id/'.fake()->numberBetween(50,100).'/1080/800',
        'parent_id' => $parentCategory ? $parentCategory->id : null,
        ];
    }
}
