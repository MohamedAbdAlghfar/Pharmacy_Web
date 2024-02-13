<?php

namespace App\Http\Controllers\Medicine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Photo;

class FilterMedicineByPriceController extends Controller
{
    public function index($minPrice , $maxPrice)
    {
     $medicines = Medicine::whereBetween('price', [$minPrice, $maxPrice])->select('medicines.name','medicines.id','photoable.filename','medicines.price','medicines.N_of_pieces')
     ->join('photoable', function ($join) {
         $join->on('photoable.photoable_id', '=', 'medicines.id')
         ->where('photoable.photoable_type', '=', 'App\Models\Medicine');
     })->get();

      if ($medicines->isEmpty()) {
          return response()->json(['error' => 'No medicines found within the specified price range'], 404);
      }

      return response()->json($medicines);


     }












}
