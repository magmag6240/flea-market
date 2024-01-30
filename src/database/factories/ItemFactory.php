<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'seller_id' => $this->faker->numberBetween(1, 30),
            'condition_id' => $this->faker->numberBetween(1, 6),
            'payment_id' => $this->faker->numberBetween(1, 2),
            'price' => $this->faker->randomNumber(),
            'item_detail' => $this->faker-> realText(),
            'image_url' => $this->faker->imageUrl(),
        ];
    }
}
