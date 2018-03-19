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
use App\Chat;
use DB;
class chatController extends Controller
{

public function insert(Request $request)
{
  $chat=new Chat();
  $chat->send_id=$request->send_id;
  $chat->recive_id=$request->recive_id;
  $chat->message=$request->message;
  $chat->save();
  return response()->json($chat);
}
}
