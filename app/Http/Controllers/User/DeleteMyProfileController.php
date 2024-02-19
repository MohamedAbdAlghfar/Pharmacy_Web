<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DeleteMyProfileController extends Controller
{
    public function index()
    {
    $user = auth()->user();
    
    if($user->Photo) {
        $filename = $user->Photo->filename; 
        unlink('images/'.$filename);
    }
    // delete medicine photo
    $user->Photo->delete();
    $user->delete();
    
    return response()->json(['message' => 'your profile successfully deleted.']);  
    }



    
}
