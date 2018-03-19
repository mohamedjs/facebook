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
use App\Post_image;
class postcontroller extends Controller
{
  public function store(Request $request)
  {
    $post=new Post();

    $user=User::find(1);
    $post->post=$request->postContent;
    $post->user_id=Auth::id();
    $post->group_id=$request->group_id;
    $post->save();

    $post_image=new Post_image();
    $post_image->post_id=$post->id;
    $file=Input::file('post_image');
    $img_name = $post->id.'.'.$file->getClientOriginalExtension();
    $file->move(public_path('image'),$img_name);
    $post_image->image = $img_name ;
    $post_image->save();

    $user=Auth::user();
    $post->name=$user->name;
    $post->image=$user->image;

    $data = json_encode($post);
    return response()->json($data);
  }
}
