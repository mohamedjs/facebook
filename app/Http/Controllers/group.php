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
class group extends Controller
{

  public function addgroup(Request $request)
  {
    $group=new Group();
    $group->group_name=$request->gname;
    $file=Input::file('gphoto');
    $img_name = $request->gname.'.'.$file->getClientOriginalExtension();
    $file->move(public_path('image'),$img_name);
    $group->image = $img_name ;
    $group->create_id=Auth::id();
    $group->save();
    return redirect('gro\\'.$group->id);
  }

  public function group($id)
  {
    $posts=Post::where('group_id',$id)->orderBy('created_at', 'desc')->get();
    $group=Group::find($id);
    $user=Auth::user();
    $add = User::Join('user_user', 'users.id', '=', 'user_user.send_id')->select('*','users.id')
                ->where('user_user.recive_id', Auth::id())->where('user_user.check',0)->get();
    return view('home.group',compact('posts','group','user','add'));
  }

  public function followpage(Request $request)
  {
    $u_group=new Group_user();
    $u_group->user_id=Auth::id();
    $u_group->group_id=$request->group_id;
    $u_group->save();
    $data= json_encode($u_group);
    return response()->json($data);
  }

  public function member($id)
  {
      $groups=Group::find($id);
      $user=Auth::user();
      $add = User::Join('user_user', 'users.id', '=', 'user_user.send_id')->select('*','users.id')
                  ->where('user_user.recive_id', Auth::id())->where('user_user.check',0)->get();
      return view('home.member',compact('groups','user','add'));
  }

  public function managegro($id)
  {
    $user=Auth::user();
    $add = User::Join('user_user', 'users.id', '=', 'user_user.send_id')->select('*','users.id')
                ->where('user_user.recive_id', Auth::id())->where('user_user.check',0)->get();
    return view('home.managegro',compact('groups','user','add'));
  }

  public function mygroup()
  {
    $user=Auth::user();
    $add = User::Join('user_user', 'users.id', '=', 'user_user.send_id')->select('*','users.id')
                ->where('user_user.recive_id', Auth::id())->where('user_user.check',0)->get();
    return view('home.mygroup',compact('user','add'));
  }

  public function allgroup()
  {
    $groups=Group::all();
    $user=Auth::user();
    $add = User::Join('user_user', 'users.id', '=', 'user_user.send_id')->select('*','users.id')
                ->where('user_user.recive_id', Auth::id())->where('user_user.check',0)->get();
    return view('home.allgroup',compact('groups','user','add'));
  }
}
