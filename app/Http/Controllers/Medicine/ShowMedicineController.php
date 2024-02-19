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
        $medicine = Medicine::select('medicines.name', 'medicines.id', 'photoable.filename', 'medicines.price')
            ->with(['pharmacies' => function ($query) {
                $query->select('pharmacy_id', 'N_of_pieces');
            }])
            ->join('photoable', function ($join) {
                $join->on('photoable.photoable_id', '=', 'medicines.id')
                    ->where('photoable.photoable_type', '=', 'App\Models\Medicine');
            })
            ->find($id); 
    
        if (!$medicine) {
            return response()->json(['error' => 'No medicine found with the specified ID'], 404);
        }
    
        // Collect all N_of_pieces for the medicine
        $n_of_pieces = $medicine->pharmacies->pluck('N_of_pieces')->sum();
        $medicine->N_of_pieces = $n_of_pieces;
        unset($medicine->pharmacies);
    
        return response()->json($medicine);
    }
    
    












}
