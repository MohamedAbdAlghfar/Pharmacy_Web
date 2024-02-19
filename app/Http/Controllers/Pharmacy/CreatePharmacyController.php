<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Pharmacy;

class CreatePharmacyController extends Controller
{
    
    public function index(Request $request) 
    {
        $rules = [ 
            'name' => 'required|min:2|max:150',
            'address' => 'required',  
            'phone' => 'required',    
            'user_id' => 'required',
            'image' => 'required',

                 ]; 
        $this->validate($request, $rules);
        $pharmacy = Pharmacy::create($request->all());
        $pharmacy->save();
        if($pharmacy) {
            
            if($file = $request->file('image')) { 

                $filename = $file->getClientOriginalName();
                $fileextension = $file->getClientOriginalExtension();
                $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;

                if($file->move('images', $file_to_store)) {
                    Photo::create([
                        'filename' => $file_to_store,
                        'photoable_id' => $pharmacy->id,
                        'photoable_type' => 'App\Models\Pharmacy', 
                    ]);
                }
            }
        }   
               
     return response()->json(['message' => 'pharmacy successfully created.']);

    }








}
