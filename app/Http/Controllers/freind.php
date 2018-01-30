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
class freind extends Controller
{
  public function addfreind(Request $request)
  {
    $user_f= new User_user();
    $user_f->send_id=Auth::id();
    $user_f->recive_id=$request->recive_id;
    $user_f->save();
    $data = json_encode($user_f);
    return response()->json($data);
  }

  public function updatafreind(Request $request)
  {
    $user_f=User_user::where('send_id', $request->send_id)->where('recive_id',Auth::id())->update(['check' => 1]);
    $data = json_encode($user_f);
    return response()->json($data);
  }

  public function deletfreind(Request $request)
  {
    if($request->send_id=="no"){
      $user_f=User_user::where('recive_id', $request->recive_id)->where('send_id',Auth::id());
    }
    else{
      $user_f=User_user::where('send_id', $request->send_id)->where('recive_id',Auth::id());
    }
    $user_f->delete();
    return 'true';
  }
}
