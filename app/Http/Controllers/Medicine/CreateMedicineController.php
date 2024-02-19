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
            'pharmacy_id' => 'required',

                 ]; 
        $this->validate($request, $rules);
        $medicine = Medicine::create($request->all());
        $medicine->save();
     // Get pharmacy ID and additional data
     $pharmacy_id = $request->input('pharmacy_id');
     $n_of_pieces = $request->input('N_of_pieces');
    
     
     // Attach the medicine to the pharmacy with additional data
     $medicine->Pharmacies()->attach($pharmacy_id, ['N_of_pieces' => $n_of_pieces]);
     
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
