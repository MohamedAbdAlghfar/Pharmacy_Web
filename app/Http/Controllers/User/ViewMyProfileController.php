<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ViewMyProfileController extends Controller
{
    public function index() 
    {

        $user = auth()->user();
      if($user->Photo)
          $user->Photo->filename ;
        return response()->json( $user);


     }








}
