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
use App\User_user;
class home extends Controller
{

  public function home()
  {
    $posts=Post::whereNull('group_id')->orderBy('created_at', 'desc')->get();
    $user=Auth::user();
    $connect=User::join('user_user', 'users.id', '=', 'user_user.send_id')->select('users.*')
                  ->where('user_user.recive_id','!=' ,Auth::id())->orWhere('user_user.send_id','!=' ,Auth::id())
                  ->inRandomOrder()->get();

    $add = User::Join('user_user', 'users.id', '=', 'user_user.send_id')->select('*','users.id')
                ->where('user_user.recive_id', Auth::id())->where('user_user.check',0)->get();
    return view('home.home',compact('posts','user','connect','add'));
  }

  public function profile($id)
  {
    $posts=Post::where('user_id', $id)->whereNull('group_id')->orderBy('created_at', 'desc')->get();
    $user=Auth::user();
    $connect=User::join('user_user', 'users.id', '=', 'user_user.send_id')->select('users.*')
                  ->where('user_user.recive_id', Auth::id())->orWhere('user_user.send_id','!=' ,Auth::id())
                  ->inRandomOrder()->get();

    $add = User::Join('user_user', 'users.id', '=', 'user_user.send_id')->select('*','users.id')
              ->where('user_user.recive_id', Auth::id())->where('user_user.check',0)->get();
    return view('home.profile',compact('posts','user','connect','add'));
  }
  public function alluser()
  {
    $connect=User::inRandomOrder()->get();
    $user=Auth::user();
    $add = User::Join('user_user', 'users.id', '=', 'user_user.send_id')->select('*','users.id')
                ->where('user_user.recive_id', Auth::id())->where('user_user.check',0)->get();
    return view('home.alluser',compact('user','connect','add'));
  }
  public function addfreind(Request $request)
  {
    $user_f= new User_user();
    $user_f->send_id=Auth::id();
    $user_f->recive_id=$request->recive_id;
    $user_f->save();
    $data = json_encode($user_f);
    return response()->json($data);
  }
}
