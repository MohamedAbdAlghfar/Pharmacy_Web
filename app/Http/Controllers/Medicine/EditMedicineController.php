<?php

namespace App\Http\Controllers\Medicine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Photo;

class EditMedicineController extends Controller
{
    public function index(Request $request, $id)
    {
        
        $validate = $request->validate([
            'name'  => 'required',
            'description'  => 'required',
            'qr_code'  => 'required',
            'price'   => 'required',
            'N_of_pieces'     => 'required',
            'type' => 'required',
            'company_name'  => 'required',
            'buy'   => 'required',
            'image'=> 'required|image',

        ]);

        $medicine = Medicine::find($id);
        $medicine->update($request->all());
        
        if ($file = $request->file('image')) { 
            $filename = $file->getClientOriginalName();
            $fileextension = $file->getClientOriginalExtension();
            $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.' . $fileextension;
        
            if ($file->move('images', $file_to_store)) {
                if ($medicine->Photo) {
                   
                      $photo = $medicine->Photo;
        
                      // Remove the old image
                      $oldFilename = $photo->filename; 
                      unlink('images/' . $oldFilename);
                    
                    $photo->filename = $file_to_store;
                    $photo->save();
                } 
                else {
                    Photo::create([
                        'filename' => $file_to_store,
                        'photoable_id' => $medicine->id,
                        'photoable_type' => 'App\Models\Medicine',
                    ]);
                }
            }
        }



      return response()->json(['message' => 'medicine successfully updated.']);

    }













}
