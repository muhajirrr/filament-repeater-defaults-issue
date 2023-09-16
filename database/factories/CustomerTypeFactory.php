<?php

namespace Database\Factories;

use App\Models\CustomerType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CustomerTypeFactory extends Factory
{
    protected $model = CustomerType::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
        ];
    }
}
