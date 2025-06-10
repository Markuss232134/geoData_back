<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    protected $model = Country::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->country(),
            'area_km2' => $this->faker->randomFloat(2, 1000, 1000000),
            'population' => $this->faker->numberBetween(50000, 100000000),
        ];
    }
}
