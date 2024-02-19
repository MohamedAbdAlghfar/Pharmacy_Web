<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Order;
use App\Models\Pharmacy;
use App\Models\MedicinePharmacy;

class CancelOrderController extends Controller
{

    public function index($order_id) 
    {
        $order = Order::find($order_id);
        if (!$order) {
            return response()->json(['error' => 'No order found with the specified ID'], 404);
        }
    
        $medicine_id = $order->medicine_id;
        $pharmacy_id = $order->pharmacy_id;
    
        $medicinePharmacy = MedicinePharmacy::where('medicine_id', $medicine_id)
        ->where('pharmacy_id', $pharmacy_id)
        ->first();
  
         
         $n_of_pieces = $medicinePharmacy->N_of_pieces;
         $buy = $medicinePharmacy->buy;


        // Calculate new values
        $newN_of_pieces = $n_of_pieces + 1; 
        $newBuy = $buy - 1;
        $medicine = Medicine::find($medicine_id);
        // Sync the relationship with the updated values
        $medicine->Pharmacies()->syncWithoutDetaching([
            $pharmacy_id => ['N_of_pieces' => $newN_of_pieces, 'buy' => $newBuy]
        ]);
    
        // Delete the order
        $order->delete(); 
    
        return response()->json(['message' => 'Order successfully deleted.']);
    }
    








}
