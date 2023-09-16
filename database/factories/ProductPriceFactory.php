<?php

namespace Database\Factories;

use App\Models\CustomerType;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductPriceFactory extends Factory
{
    protected $model = ProductPrice::class;

    public function definition()
    {
        return [
            'product_id' => Product::factory(),
            'customer_type_id' => CustomerType::factory(),
            'price' => $this->faker->randomFloat(),
        ];
    }
}
