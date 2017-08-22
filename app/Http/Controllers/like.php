<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Comment;
use App\User;
use App\Like;
use App\Group;
use App\Group_user;
class like extends Controller
{
  public function addlike(Request $request)
  {
    $like=new Like();
    $like->post_id=$request->post_id;
    $like->user_id=Auth::id();
    $like->save();
    $user=Auth::user();
    $like->image=$user->image;
    $data=json_encode($like);
    return response()->json($data);
  }
}
