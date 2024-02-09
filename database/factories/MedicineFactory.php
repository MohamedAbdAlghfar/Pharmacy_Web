<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicine>
 */
class MedicineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(), 
            'description' => $this->faker->sentence,
            'qr_code' => $this->faker->url,
            'price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 20, $max = 1000),
            'N_of_pieces' => $this->faker->numberBetween($min = 1, $max = 100),
            'type' => $this->faker->word,
            'company_name' => $this->faker->word,
            'buy' => $this->faker->numberBetween($min = 1, $max = 100),






        ];
    }
}
