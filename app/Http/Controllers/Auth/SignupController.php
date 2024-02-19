<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\Photo;

class SignupController extends Controller
{
    
    public $token;

    public function signup(Request $Request)
    {
        $validatedData = Validator::make(($Request->all()),[
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

        if ($validatedData->fails()) {
            return $validatedData->errors();
        }

        $user = User::create([
            'name'  => $Request->name,
            'email'   => $Request->email,
            'age'     => $Request->age,
            'address' => $Request->address,
            'gender'  => $Request->gender,
            'phone'   => $Request->phone,
            'password'=> Hash::make($Request->input('password')),
            'academic_degree' => $Request->academic_degree,
        ]);   
        


        $this->token = JWTAuth::fromUser($user);

        if($user) {
            
            if($file = $Request->file('image')) { 

                $filename = $file->getClientOriginalName();
                $fileextension = $file->getClientOriginalExtension();
                $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;

                if($file->move('images', $file_to_store)) {
                    Photo::create([
                        'filename' => $file_to_store,
                        'photoable_id' => $user->id,
                        'photoable_type' => 'App\Models\User', 
                    ]);
                }
            }
        }

        return response()->json([
            'status' => 'success',
            'message' => 'user registered successfully',
            'token' => $this->token , 
            'user' => $user ,
           
        ]);
    }


}
