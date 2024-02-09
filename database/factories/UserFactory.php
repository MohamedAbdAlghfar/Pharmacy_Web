<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(), 
            'email' => fake()->unique()->safeEmail(), 
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'phone' => $this->faker->phoneNumber('###-###-####'),
            'role' => $this->faker->randomElement([0,1]),
            'gender' => $this->faker->randomElement([0,1]), 
            'salary' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 20, $max = 1000), 
            'age' => $this->faker->numberBetween($min = 1, $max = 100), 
            'academic_degree' => $this->faker->randomElement([0,1]),
            'address' => $this->faker->sentence,



        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
