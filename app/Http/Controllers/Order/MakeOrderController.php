<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Order;
use App\Models\Pharmacy;
use App\Models\MedicinePharmacy;

class MakeOrderController extends Controller 
{
    
  public function index($medicine_id, $pharmacy_id)  
  {
    $medicine = Medicine::find($medicine_id);
      $order = Order::create([
          'price' => $medicine->price,
          'medicine_id' => $medicine_id,
          'pharmacy_id' => $pharmacy_id, 
      ]);
  
     
     
      
      $medicinePharmacy = MedicinePharmacy::where('medicine_id', $medicine_id)
      ->where('pharmacy_id', $pharmacy_id)
      ->first();

       if ($medicinePharmacy) {
       $n_of_pieces = $medicinePharmacy->N_of_pieces;
       $buy = $medicinePharmacy->buy;
        } else {
           return response()->json(['message' => 'this medicine not exist in this pharmacy']); 
         }
      $newN_of_pieces = $n_of_pieces - 1; 
      $newBuy = $buy + 1;
  
      // Sync the relationship with the updated values
      $medicine->Pharmacies()->syncWithoutDetaching([
          $pharmacy_id => ['N_of_pieces' => $newN_of_pieces, 'buy' => $newBuy]
      ]);

  
      return response()->json(['message' => 'Order successfully created.']); 
  }
  



}
