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
            $medicines = Medicine::inRandomOrder()->limit(3)->get();
            
            foreach ($medicines as $medicine) {
                $N_of_pieces = random_int(0, 100); 
                $buy = random_int(0, 100);    
                $pharmacy->Medicines()->attach($medicine, [
                    'N_of_pieces' => $N_of_pieces, 
                    'buy' => $buy,
                ]);
            }
        }





        photo::factory(5)->create();
        Order::factory(20)->create();




    }
}
