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

class commentcontroller extends Controller
{
  public function addcoment(Request $request)
  {
    $comment=new Comment();
    $comment->comment=$request->comment;
    $comment->post_id=$request->post_id;
    $comment->user_id=Auth::id();
    $comment->save();
    $user=Auth::user();
    $comment->name=$user->name;
    $comment->image=$user->image;
    $data= json_encode($comment);
    return response()->json($data);
  }

  public function deleteComment(Request $request)
  {
    $comment = Comment::find($request->comment_id);
    $comment->delete();
    return 'true' ;
  }

  public function updataComment(Request $request)
  {
    $comment = Comment::find($request->comment_id);
    $post_id=$comment->post_id;
    $comment->delete();
    return $post_id;
  }
}
