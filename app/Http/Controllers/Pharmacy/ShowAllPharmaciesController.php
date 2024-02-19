<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Pharmacy;

class ShowAllPharmaciesController extends Controller 
{
    public function index()
    {
        $pharmacies = Pharmacy::orderBy('pharmacies.created_at', 'desc')->select('pharmacies.name', 'pharmacies.id', 'photoable.filename','pharmacies.address','pharmacies.phone')
        ->join('photoable', function ($join) {
            $join->on('photoable.photoable_id', '=', 'pharmacies.id')
                ->where('photoable.photoable_type', '=', 'App\Models\Pharmacy');
        })
        ->get();


        return response()->json($pharmacies);


     }










}
