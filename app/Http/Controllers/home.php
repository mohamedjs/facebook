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
use DB;
class home extends Controller
{

  public function home()
  {
    $posts=Post::whereNull('group_id')->orderBy('created_at', 'desc')->get();
    $user=Auth::user();
    $freind_request=Auth::user()->recives()->wherePivot('check',0)->get();
    $add_freind=Auth::user()->sends()->wherePivot('check',0)->get();
    $freind1 = Auth::user()->recives()->wherePivot('check',1)->get();
    $freind2 = Auth::user()->sends()->wherePivot('check',1)->get();
    $myarray=array();
        foreach ($freind_request as $con) {
          array_push($myarray, $con->id);
        }
        foreach ($freind1 as $con1) {
          array_push($myarray, $con1->id);
        }
        foreach ($add_freind as $con1) {
          array_push($myarray, $con1->id);
        }
        foreach ($freind2 as $con1) {
          array_push($myarray, $con1->id);
        }
    $users = DB::table('users')
                    ->whereNotIn('id', $myarray)
                    ->get();
    return view('home.home',compact('posts','user','freind_request','add_freind','freind1','freind2','users'));
  }

  public function profile($id)
  {
    $posts=Post::where('user_id', $id)->whereNull('group_id')->orderBy('created_at', 'desc')->get();
    $user=Auth::user();
    $freind_request=Auth::user()->recives()->wherePivot('check',0)->get();
    $add_freind=Auth::user()->sends()->wherePivot('check',0)->get();
    $freind1 = Auth::user()->recives()->wherePivot('check',1)->get();
    $freind2 = Auth::user()->sends()->wherePivot('check',1)->get();
    $myarray=array();
        foreach ($freind_request as $con) {
          array_push($myarray, $con->id);
        }
        foreach ($freind1 as $con1) {
          array_push($myarray, $con1->id);
        }
        foreach ($add_freind as $con1) {
          array_push($myarray, $con1->id);
        }
        foreach ($freind2 as $con1) {
          array_push($myarray, $con1->id);
        }
    $users = DB::table('users')->whereNotIn('id', $myarray)->get();
    return view('home.profile',compact('posts','user','freind_request','add_freind','freind1','freind2','users'));
  }
  public function alluser($name)
  {
    $user=Auth::user();
    $freind_request=Auth::user()->recives()->wherePivot('check',0)->get();
    $add_freind=Auth::user()->sends()->wherePivot('check',0)->get();
    $freind1 = Auth::user()->recives()->wherePivot('check',1)->get();
    $freind2 = Auth::user()->sends()->wherePivot('check',1)->get();
    $myarray=array();
        foreach ($freind_request as $con) {
          array_push($myarray, $con->id);
        }
        foreach ($freind1 as $con1) {
          array_push($myarray, $con1->id);
        }
        foreach ($add_freind as $con1) {
          array_push($myarray, $con1->id);
        }
        foreach ($freind2 as $con1) {
          array_push($myarray, $con1->id);
        }
    $users = DB::table('users')->whereNotIn('id', $myarray)->get();
    return view('home.alluser',compact('user','freind_request','add_freind','freind1','freind2','users','name'));
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
