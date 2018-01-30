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
class setting extends Controller
{
  public function show()
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
    return view('home.setting',compact('user','freind_request','add_freind','freind1','freind2','users','name'));
  }
  public function edit(Request $request)
  {
    $user=User::find(Auth::id());
    if($request->user_name){$user->name=$request->user_name;}
    else{$user->name=Auth::user()->name;}

    if($request->email){$user->email=$request->email;}
    else{$user->email=Auth::user()->email;}

    if($request->phone){$user->phone=$request->phone;}
    else{$user->phone=Auth::user()->phone;}

    if($request->gender){$user->gender=$request->gender;}
    else{$user->gender=Auth::user()->gender;}

    if($request->address){$user->address=$request->address;}
    else{$user->address=Auth::user()->address;}

    if($request->job){$user->job=$request->job;}
    else{$user->job=Auth::user()->job;}

    if($request->birhtdata){$user->birhtdata=$request->birhtdata;}
    else{$user->birhtdata=Auth::user()->birhtdata;}

    $user->save();
    return response()->json($user);
  }
  public function changeprofileimage(Request $request)
  {
    $user=User::find(Auth::id());
    $file=Input::file('profile_picture');
    $img_name = Auth::user()->phone.'.'.$file->getClientOriginalExtension();
    $file->move(public_path('image'),$img_name);
    $user->image = $img_name ;
    $user->save();
    return response()->json($img_name);
  }
  public function changecoverimage(Request $request)
  {
    $user=User::find(Auth::id());
    $file=Input::file('cover_picture');
    $img_name = Auth::user()->email.'.'.$file->getClientOriginalExtension();
    $file->move(public_path('image'),$img_name);
    $user->cover = $img_name ;
    $user->save();
    return response()->json($img_name);
  }
}
