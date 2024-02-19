<?php

namespace App\Http\Controllers\Statistics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class TotalOrderPriceInThisDayController extends Controller
{
    public function index($id)
    {
        $today = now()->toDateString(); // Get the current date

        $totalPrice = Order::where('pharmacy_id', $id)
            ->whereDate('created_at', $today)
            ->sum(DB::raw('price'));
      
       
     return response()->json($totalPrice);



    }








}
