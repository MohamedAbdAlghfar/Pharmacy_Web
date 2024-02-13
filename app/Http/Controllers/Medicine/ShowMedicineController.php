<?php

namespace App\Http\Controllers\Medicine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Photo;

class ShowMedicineController extends Controller
{
    public function index($id) 
    {
        
        $medicine = Medicine::select('medicines.name','medicines.id','photoable.filename','medicines.description','medicines.price','medicines.N_of_pieces','medicines.type','medicines.company_name','medicines.buy')
        ->join('photoable', function ($join) {
            $join->on('photoable.photoable_id', '=', 'medicines.id')
            ->where('photoable.photoable_type', '=', 'App\Models\Medicine');
        })->find($id);
 
        return response()->json($medicine);



    }













}
