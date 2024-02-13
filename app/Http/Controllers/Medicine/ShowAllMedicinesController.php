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
        $medecine = Medicine::orderBy('medicines.created_at', 'desc')->select('medicines.name','medicines.id','photoable.filename','medicines.price','medicines.N_of_pieces')
        ->join('photoable', function ($join) {
            $join->on('photoable.photoable_id', '=', 'medicines.id')
            ->where('photoable.photoable_type', '=', 'App\Models\Medicine');
        })->get();
            
         return response()->json($medecine); 
    }
           

    }





