<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pharmacy;
use App\Models\MedicinePharmacy;

class ShowPharmacyController extends Controller
{
    public function index($id)
    {
      $pharmacy = Pharmacy::find($id);    
      if($pharmacy->Photo)
      $pharmacy->photo = $pharmacy->Photo->filename ;    

if ($pharmacy) { 
    
    foreach ($pharmacy->Medicines as $medicine) {
         $medicine->name ;
         $medicine_id = $medicine->id ;
         $medicinePharmacy = MedicinePharmacy::where('medicine_id', $medicine_id)
         ->where('pharmacy_id', $id)
         ->first();         
          $medicine->n_of_pieces = $medicinePharmacy->N_of_pieces;
          $medicine->buy = $medicinePharmacy->buy;
         if($medicine->Photo)
          $medicine->photo = $medicine->Photo->filename ;

    }   

    foreach ($pharmacy->Orders as $order) {
        $order->price ;
      
   }   





} else {
    echo "Pharmacy not found."; 
} 


return response()->json($pharmacy);
     }







}
