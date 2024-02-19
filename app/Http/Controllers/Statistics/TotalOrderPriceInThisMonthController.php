<?php

namespace App\Http\Controllers\Statistics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TotalOrderPriceInThisMonthController extends Controller
{
     public function index($id)
     {
    $startOfMonth = Carbon::now()->startOfMonth();
    $endOfMonth = Carbon::now()->endOfMonth();

    $totalPrice = Order::where('pharmacy_id', $id)
        ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
        ->sum('price');

    return response()->json($totalPrice);
      }



}
