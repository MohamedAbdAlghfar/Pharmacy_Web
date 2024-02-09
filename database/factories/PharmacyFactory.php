<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pharmacy>
 */
class PharmacyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userid = User::all()->random()->id;
        return [
            'name' => fake()->name(),
            'buy' => $this->faker->randomElement([2,1,3,4,0]), 
            'address' => $this->faker->sentence,
            'phone' => $this->faker->phoneNumber('###-###-####'),
            'user_id' => $userid,



        ];
    }
}
