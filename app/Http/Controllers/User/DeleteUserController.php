<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Photo;

class DeleteUserController extends Controller
{
    
public function index($id)
{
   $user = User::find($id);
   if($user->Photo) {
    $filename = $user->Photo->filename;
    unlink('images/'.$filename);
}
// delete medicine photo
$user->Photo->delete();
$user->delete();

return response()->json(['message' => 'user successfully deleted.']);  




}




}
