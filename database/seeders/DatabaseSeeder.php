<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Medicine;
use App\Models\Pharmacy;
use App\Models\Photo;
use App\Models\Order;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Medicine::factory(50)->create();
       $pharmacies =  Pharmacy::factory(5)->create();
        foreach ($pharmacies as $pharmacy) {
            $medicines_ids = [];

            $medicines_ids[] = Medicine::all()->random()->id;
            $medicines_ids[] = Medicine::all()->random()->id;
            $medicines_ids[] = Medicine::all()->random()->id;
            $medicines_ids[] = Medicine::all()->random()->id;
            $pharmacy->medicines()->sync( $medicines_ids );
        }

        photo::factory(5)->create();
        Order::factory(20)->create();




    }
}
