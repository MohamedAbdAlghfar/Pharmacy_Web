<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Pharmacy;

class EditPharmacyController extends Controller
{
    
    public function index(Request $request, $id)
    {
        
        $validate = $request->validate([ 
            'name' => 'required|min:2|max:150', 
            'address' => 'required',  
            'phone' => 'required',    
            'user_id' => 'required',
            'image' => 'required',

        ]);

        $pharmacy = Pharmacy::find($id);
        $pharmacy->update($request->all());
        
        if ($file = $request->file('image')) { 
            $filename = $file->getClientOriginalName();
            $fileextension = $file->getClientOriginalExtension();
            $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.' . $fileextension;
        
            if ($file->move('images', $file_to_store)) {
                if ($pharmacy->Photo) {
                   
                      $photo = $pharmacy->Photo;
        
                      // Remove the old image
                      $oldFilename = $photo->filename; 
                      unlink('images/' . $oldFilename);
                    
                    $photo->filename = $file_to_store;
                    $photo->save();
                } 
                else {
                    Photo::create([
                        'filename' => $file_to_store,
                        'photoable_id' => $pharmacy->id,
                        'photoable_type' => 'App\Models\Pharmacy',
                    ]);
                }
            }
        }



      return response()->json(['message' => 'Pharmacy successfully updated.']);

    }












}
