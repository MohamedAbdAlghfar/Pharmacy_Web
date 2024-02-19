<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Medicine;
use App\Models\Pharmacy;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

$medicine_id = Medicine::all()->random()->id;
$pharmacy_id = Pharmacy::all()->random()->id;

        return [
            
            'price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 20, $max = 1000),
            'medicine_id' =>$medicine_id,
            'pharmacy_id' =>$pharmacy_id,




        ];
    }
}
