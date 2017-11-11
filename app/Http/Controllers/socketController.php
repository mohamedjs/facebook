<?php

namespace App\Http\Controllers;
use LRedis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;
class socketController extends Controller
{

  public function show($id)
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
    $chatf=User::where('id',$id)->get();
    $message=DB::table('chats')->select('*')->where([
                  ['send_id', '=', Auth::id()],
                  ['recive_id', '=', $id],])
                  ->orWhere([
                    ['recive_id', '=', Auth::id()],
                    ['send_id', '=', $id],
                    ])->get();
    return view('home.chat',compact('user','freind_request','add_freind','freind1','freind2','users','chatf','message'));
  }
  public function sendMessage(Request $request){
		$redis = LRedis::connection();
		$data = ['message' => $request->message, 'user' => $request->user];
		$redis->publish('message', json_encode($data));
		return response()->json([]);
	}
}
