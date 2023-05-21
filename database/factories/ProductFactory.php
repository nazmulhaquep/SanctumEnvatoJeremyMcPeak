<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->name();
        return [
            'name'=>$name,
            'price'=>$this->faker->numberBetween(100,2000),
            'description'=>$this->faker->text(),
            'image'=>$this->faker->imageUrl(),
        ];
    }
}
