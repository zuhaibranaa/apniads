<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'brand' => $this->faker->company(),
            'model' => $this->faker->numerify('####'),
            'health' => $this->faker->numerify('##'),
            'condition' => false,
            'status' => true,
            'location' => $this->faker->city(),
            'specifications' => $this->faker->sentence(),
            'price' => $this->faker->numerify('####'),
            'images' => $this->faker->image(public_path().'/images/'),
            'is_negotiable' => true,
            'seller_id' => $this->faker->numerify('#'),
            'category_id' => $this->faker->numerify('#'),
        ];
    }
}
