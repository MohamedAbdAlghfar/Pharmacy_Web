<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class MakeOwnerController extends Controller
{
    public function index($id)
    {
       $user = User::find($id);
       $user->role = 1 ;  
       $user->save();  
       return response()->json(['message' => 'this user turn into OWNER successfully.']);  
    }





}
