<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Photo;

class ViewUsersController extends Controller
{
  public function index() 
  {
    $users = User::orderBy('users.created_at', 'desc')->select('users.name', 'users.id', 'photoable.filename','users.address','users.phone','users.email','users.role','users.gender','users.salary','users.age','users.academic_degree')
    ->join('photoable', function ($join) {
        $join->on('photoable.photoable_id', '=', 'users.id')
            ->where('photoable.photoable_type', '=', 'App\Models\User');
    })
    ->get();

   return response()->json($users);

}

}
