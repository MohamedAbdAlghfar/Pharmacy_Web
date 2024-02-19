<?php

namespace App\Http\Controllers\Medicine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Pharmacy;

class AttachMedicinePharmacyController extends Controller
{
    
    public function index(Request $request, $medicine_id , $pharmacy_id)
    {
  
            
        $medicine = Medicine::find($medicine_id);
        $n_of_pieces = $request->input('N_of_pieces');
    
     
        // Attach the medicine to the pharmacy with additional data
        $medicine->Pharmacies()->attach($pharmacy_id, ['N_of_pieces' => $n_of_pieces]);

     return response()->json(['message' => 'medicine successfully attached.']);

    }














}
