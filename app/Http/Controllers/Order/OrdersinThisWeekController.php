<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Order;
use Carbon\Carbon;

class OrdersinThisWeekController extends Controller
{
    
    public function index()
    {
        $currentDate = Carbon::now();
        $startOfWeek = $currentDate->startOfWeek()->toDateString();
        $endOfWeek = $currentDate->endOfWeek()->toDateString();
    
        $orders = Order::whereBetween('orders.created_at', [$startOfWeek, $endOfWeek])
            ->orderBy('orders.created_at', 'desc')
            ->select('medicines.name as medicine_name', 'medicines.id', 'orders.price', 'orders.created_at', 'pharmacies.name as pharmacy_name')
            ->join('medicines', 'medicines.id', '=', 'orders.medicine_id')
            ->join('pharmacies', 'pharmacies.id', '=', 'orders.pharmacy_id')
            ->get();
        
        return response()->json($orders);
    }








}
