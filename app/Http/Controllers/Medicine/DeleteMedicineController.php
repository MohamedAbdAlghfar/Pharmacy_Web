<?php

namespace App\Http\Controllers\Medicine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Photo;

class DeleteMedicineController extends Controller
{
    public function index($id)
    {
       
       $medicine = Medicine::find($id);
        if($medicine->Photo) {
            $filename = $medicine->Photo->filename;
            unlink('images/'.$filename);
        }
        // delete medicine photo
        $medicine->Photo->delete();
        $medicine->delete();
        
        return response()->json(['message' => 'medicine successfully deleted.']);  
    
    }


    









}
