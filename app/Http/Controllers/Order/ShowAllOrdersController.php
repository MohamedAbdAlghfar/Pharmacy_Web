<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Order;
use App\Models\Photo;

class ShowAllOrdersController extends Controller
{
    public function index()
{

    $orders = Order::orderBy('orders.created_at', 'desc')
    ->select('medicines.name as medicine_name', 'medicines.id', 'photoable.filename', 'orders.price', 'orders.created_at', 'pharmacies.name as pharmacy_name')
    ->join('medicines', 'medicines.id', '=', 'orders.medicine_id')
    ->join('pharmacies', 'pharmacies.id', '=', 'orders.pharmacy_id')
    ->join('photoable', function ($join) {
        $join->on('photoable.photoable_id', '=', 'medicines.id')
            ->where('photoable.photoable_type', '=', 'App\Models\Medicine');
    })
    ->get();
    return response()->json($orders); 
  
  }
}


