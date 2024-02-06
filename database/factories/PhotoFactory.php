<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Medicine;
use App\Models\Pharmacy;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userid = User::all()->random()->id;
        $medicineid = Medicine::all()->random()->id;
        $pharmacyid = Pharmacy::all()->random()->id;
        $photoable_id = $this->faker->randomElement([ $userid, $medicineid , $pharmacyid ]);
        if($photoable_id == $userid)
            $photoable_type = 'App\Models\User';
        elseif($photoable_id == $medicineid)
            $photoable_type = 'App\Models\Medicine';
        elseif($photoable_id == $pharmacyid)
            $photoable_type = 'App\Models\Pharmacy';
        
       
    
        return [
            'filename' => $this->faker->randomElement(['1.jpeg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg','8.jpg','9.jpg','10.jpg',]),
    
            'photoable_id' => $photoable_id,
            'photoable_type' => $photoable_type,
        ];
    }
}
