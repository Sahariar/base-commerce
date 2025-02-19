<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Product::factory(25)->create()->each(function ($product) {
            ProductVariant::factory()->create([
                'product_id' => $product->id, // Ensures each product has exactly one variant
            ]);
        });

    }
}
