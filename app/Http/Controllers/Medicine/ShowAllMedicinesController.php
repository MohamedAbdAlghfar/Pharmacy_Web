<?php

namespace App\Http\Controllers\Medicine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Photo;

class ShowAllMedicinesController extends Controller
{
    public function index()
    {
        $medicines = Medicine::orderBy('medicines.created_at', 'desc')->select('medicines.name', 'medicines.id', 'photoable.filename', 'medicines.price')
        ->with(['pharmacies' => function ($query) {
            $query->select('pharmacy_id', 'N_of_pieces');
        }])
        ->join('photoable', function ($join) {
            $join->on('photoable.photoable_id', '=', 'medicines.id')
                ->where('photoable.photoable_type', '=', 'App\Models\Medicine');
        })
        ->get();
    
    if ($medicines->isEmpty()) {
        return response()->json(['error' => 'No medicines found within the specified price range'], 404);
    }
    
    // Collect all N_of_pieces for each medicine
    $medicines->transform(function ($medicine) { 
        $n_of_pieces = $medicine->pharmacies->pluck('N_of_pieces')->sum();
        $medicine->N_of_pieces = $n_of_pieces;
        unset($medicine->pharmacies);
        return $medicine;
    });
    
    return response()->json($medicines);
     }
           

    }





