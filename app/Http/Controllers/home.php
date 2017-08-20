<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;
use App\Like;
use App\Group;
use App\User_group;
class home extends Controller
{
  public function home()
  {
    $posts=Post::whereNull('group_id')->orderBy('created_at', 'desc')->get();
    $user=User::find(1);
    return view('home.home',compact('posts','user'));
  }
  public function profile($id)
  {
    $posts=Post::where('user_id', $id)->orderBy('created_at', 'desc')->get();
    $user=User::find(1);
    return view('home.profile',compact('posts','user'));
  }
  public function managegro($id)
  {
    $groups=Group::where('create_id',$id);
    $user=User::find(1);
    return view('home.managegro',compact('groups','user'));
  }
  /**********POST***********/
    public function store(Request $request)
    {
      $post=new Post();
      $user=User::find(1);
      $post->post=$request->postContent;
      $post->user_id=1;
      $post->group_id=$request->group_id;
      $post->save();
      $user=User::find(1);
      $post->name=$user->name;
      $data = json_encode($post);
      return response()->json($data);
    }
    public function addcoment(Request $request)
    {
      $comment=new Comment();
      $comment->comment=$request->comment;
      $comment->post_id=$request->post_id;
      $comment->user_id=1;
      $comment->save();
      $user=User::find(1);
      $comment->name=$user->name;
      $data= json_encode($comment);
      return response()->json($data);
    }
    public function addlike(Request $request)
    {
      $like=new Like();
      $like->post_id=$request->post_id;
      $like->user_id=1;
      $like->save();
      $data=json_encode($like);
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
    /**********END_POST***********/
    /**********group***********/
    public function addgroup(Request $request)
    {
      $group=new Group();
      $group->group_name=$request->gname;
      $file=Input::file('gphoto');
      $img_name = $request->gname.'.'.$file->getClientOriginalExtension();
      $file->move(public_path('image'),$img_name);
      $group->image = $img_name ;
      $group->create_id=1;
      $group->save();
      return redirect('gro\\'.$group->id);
    }
    public function group($id)
    {
      $posts=Post::where('group_id',$id)->orderBy('created_at', 'desc')->get();
      $group=Group::find($id);
      $user=User::find(1);
      return view('home.group',compact('posts','group','user'));
    }
    public function followpage(Request $request)
    {
      $u_group=new User_group();
      $u_group->user_id=1;
      $u_group->group_id=$request->group_id;
      $u_group->save();
      $data= json_encode($u_group);
      return response()->json($data);
    }
    public function member($id)
    {
        $groups=Group::find($id);
        $user=User::find(1);
        return view('home.member',compact('groups','user'));
    }
    /**********END_group***********/
}
