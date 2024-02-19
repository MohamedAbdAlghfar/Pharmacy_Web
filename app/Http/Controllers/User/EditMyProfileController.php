<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Photo;

class EditMyProfileController extends Controller
{
    
  public function index(Request $request) 
  {
    $user = auth()->user();
    $validate = $request->validate([  
        'name'  => 'required',
        'email'   => 'required|email|unique:users',
        'age'     => 'required',
        'address' => 'nullable',
        'gender'  => 'required',
        'phone'   => 'required',
        'password'=> 'required|min:8|confirmed',
        'academic_degree' => 'required',
        'image' => 'required',
    ]);

    $user->update($request->all()); 

    if ($file = $request->file('image')) { 
        $filename = $file->getClientOriginalName();
        $fileextension = $file->getClientOriginalExtension();
        $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.' . $fileextension;
    
        if ($file->move('images', $file_to_store)) {
            if ($user->Photo) {
               
                  $photo = $user->Photo;
    
                  // Remove the old image
                  $oldFilename = $photo->filename; 
                  unlink('images/' . $oldFilename);
                
                $photo->filename = $file_to_store;
                $photo->save();
            } 
            else {
                Photo::create([
                    'filename' => $file_to_store,
                    'photoable_id' => $user->id,
                    'photoable_type' => 'App\Models\User',
                ]);
            }
        }
    }



    return response()->json(['message' => 'profile successfully updated.']);

  }








}
