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
class post extends Controller
{
  public function store(Request $request)
  {
    $post=new Post();
    $user=User::find(1);
    $post->post=$request->postContent;
    $post->user_id=Auth::id();
    $post->group_id=$request->group_id;
    $post->save();
    $user=Auth::user();
    $post->name=$user->name;
    $post->image=$user->image;
    $data = json_encode($post);
    return response()->json($data);
  }
}
