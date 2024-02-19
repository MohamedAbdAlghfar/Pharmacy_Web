<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Pharmacy;

class DeletePharmacyController extends Controller
{
    public function index($id)
    {
       
       $pharmacy = Pharmacy::find($id);
        if($pharmacy->Photo) {
            $filename = $pharmacy->Photo->filename;
            unlink('images/'.$filename);
        }
        // delete medicine photo
        $pharmacy->Photo->delete();
        $pharmacy->delete();
        
        return response()->json(['message' => 'pharmacy successfully deleted.']);  
    
    }











}
