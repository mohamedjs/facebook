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
class home extends Controller
{

  public function home()
  {
    $posts=Post::whereNull('group_id')->orderBy('created_at', 'desc')->get();
    $user=Auth::user();
    $connect=User::inRandomOrder()->get();
    return view('home.home',compact('posts','user','connect'));
  }

  public function profile($id)
  {
    $posts=Post::where('user_id', $id)->whereNull('group_id')->orderBy('created_at', 'desc')->get();
    $user=Auth::user();
    $connect=User::inRandomOrder()->get();
    return view('home.profile',compact('posts','user','connect'));
  }
  public function alluser()
  {
    $connect=User::inRandomOrder()->get();
    $user=Auth::user();
    return view('home.alluser',compact('user','connect'));
  }
}
