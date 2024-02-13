<?php

namespace App\Http\Controllers\Medicine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Photo;


class CreateMedicineController extends Controller
{
    
    public function index(Request $request)
    {
        $rules = [
            'name' => 'required|min:2|max:150',
            'description' => 'required',  
            'qr_code' => 'required',    
            'price' => 'required',
            'N_of_pieces' => 'required',
            'type' => 'required',
            'company_name' => 'required',
            'image' => 'required',

                 ]; 
        $this->validate($request, $rules);
        $medicine = Medicine::create($request->all());
        $medicine->save();
        if($medicine) {
            
            if($file = $request->file('image')) {

                $filename = $file->getClientOriginalName();
                $fileextension = $file->getClientOriginalExtension();
                $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;

                if($file->move('images', $file_to_store)) {
                    Photo::create([
                        'filename' => $file_to_store,
                        'photoable_id' => $medicine->id,
                        'photoable_type' => 'App\Models\Medicine', 
                    ]);
                }
            }
        }   
               
     return response()->json(['message' => 'medicine successfully created.']);

    }



















}
