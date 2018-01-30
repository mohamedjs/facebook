@extends('layout.home1')

@section('content')
  <div class="col-md-12">
    <input type="hidden" id="group_id" value="{{$group->id}}">
        <div class="widget">
          <div class="cover-photo">
            <div class="group-timeline-img">
                <img src="../image/{{$group->group_name}}.jpg" alt="">
            </div>
            <div class="group-name">
                <h2><a href="#">{{$group->group_name}}</a></h2>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="box profile-info n-border-top">
          <form method="post" id="postform">
              {{csrf_field()}}
              <input type="hidden" id="group_id" name="group_id" value="{{$group->id}}">
              <textarea class="form-control input-lg p-text-area" rows="2" id="postContent" name="postContent" placeholder="Whats in your mind today?"></textarea>
              <div class="box-footer box-form">
                  <button type="submit" class="btn btn-azure pull-right" id="postbtn">Post</button>
                  <ul class="nav nav-pills">
                      <li><a href="#"><i class="fa fa-map-marker"></i></a></li>
                      <li><a href="#"><input type="file" name="post_image" value="" class="fa fa-camera"></a></li>
                      <li><a href="#"><i class=" fa fa-film"></i></a></li>
                      <li><a href="#"><i class="fa fa-microphone"></i></a></li>
                  </ul>
              </div>
          </form>
        </div>

        @foreach ($posts as $key => $post)
        <div class="box box-widget" id="pContainer">
          <div class="box-header with-border">
            <div class="user-block">
              <img class="img-circle" src="../image/{{$post->poster->image}}" alt="User Image">
              <span class="username"><a href="#">{{$post->poster->name}}.</a></span>
              <span class="description">Shared publicly - {{$post->created_at}}</span>
            </div>
          </div>

          <?php $image=DB::table('post_images')->where('post_id',$post->id)->get(); ?>
          <div class="box-body" style="display: block;">
            <p>{{$post->post}}</p>
            @foreach ($image as $key => $img)
            <img class="img-responsive show-in-modal" src="../image/{{$img->image}}" alt="Photo">
            @endforeach

            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
            @if(isset($post->likes[$key]) && $post->likes[$key]->user_id==Auth::id())
            <button type="button" class="btn btn-default btn-xs" onclick="unlike({{$post->likes[$key]->id}},{{$post->id}})" id="like{{$post->id}}" po-id="{{$post->id}}"><i class="fa fa-thumbs-o-up lo{{$post->id}}" style="color: blue;"></i> Like</button>
            @else
            <button type="button" class="btn btn-default btn-xs" onclick="like({{$post->id}})" id="like{{$post->id}}" po-id="{{$post->id}}"><i class="fa fa-thumbs-o-up lo{{$post->id}}"></i> Like</button>
            @endif
            <span class="pull-right text-muted"> <a id="li{{$post->id}}"><?php echo count($post->likes); ?></a> likes - <a><?php echo count($post->comments); ?></a> comments</span>
          </div>
          <div class="box-footer box-comments {{$post->id}}" style="display: block;">
          @foreach ($post->comments as $comment)
            <div class="box-comment" id="comment{{$comment->id}}">
              <img class="img-circle img-sm" src="../image/{{$comment->user->image}}" alt="User Image">
              <div class="comment-text">
                <span class="username">
                {{$comment->user->name}}
                <span class="text-muted pull-right">{{$comment->created_at}}</span>
                </span>
                <p id="com{{$comment->id}}">{{$comment->comment}}.</p>
              </div>
              @if($comment->user->id==Auth::id())
              <div class="actionss">
                  <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      <i class="fa fa-play-circle fa-2x"></i></a>
                      <ul class="dropdown-menu pull-right" role="menu">
                          <li><a onclick="updataComment({{$comment->id}})" id="updata{{$comment->id}}">updata</a></li>
                          <li><a onclick="deleteComment({{$comment->id}})" id="delet{{$comment->id}}">Delete</a></li>
                      </ul>
                  </div>
              </div>
              @endif
            </div>
            @endforeach
          </div>
          <div class="box-footer" style="display: block;">
            <form action="#" method="post">
              {{csrf_field()}}
              <img class="img-responsive img-circle img-sm" src="../image/{{Auth::user()->image}}" alt="Alt Text">
              <div class="img-push">
                <input type="text" class="form-control input-sm submit_on_enter" id="input{{$post->id}}" p-id="{{$post->id}}" placeholder="Press enter to post comment">
              </div>
            </form>
          </div>
        </div><!--  end posts-->
        @endforeach
      </div>
      <div class="col-md-5">
                  <div class="widget">
                    <div class="widget-header">
                      <h3 class="widget-caption">Actions</h3>
                    </div>
                    <div class="widget-body bordered-top bordered-sky">
                      <?php $c=0 ?>
                    @foreach($user->groups as $gr)
                      @if($gr->id==$group->id)
                      <?php $c=1 ?>
                      @endif
                    @endforeach
                    @if($c==1)
                      <button type="button" name="button" class="like_page btn btn-default" style="background-color:blue;color:#fff;padding: 8px;width: 65px;"><i class="fa fa-thumbs-up fa-2x"></i></button>
                    @else
                    <button type="button" name="button" class="like_page btn btn-azure" style="padding: 8px;width: 65px;"><i class="fa fa-thumbs-up fa-2x"></i></button>
                    @endif
                        <button type="button" class="btn btn-azure"><i class="fa fa-share"></i>Share</button>
                        <button type="button" class="btn btn-azure"><i class="fa fa-user-times"></i>Leave grup</button>
                    </div>
                  </div>

                  <div class="widget">
                    <div class="widget-header">
                      <h3 class="widget-caption">Description</h3>
                    </div>
                    <div class="widget-body bordered-top bordered-sky">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi aliquam accumsan mauris, sit amet facilisis risus pretium a. Donec a erat ex. Sed facilisis nulla ut elit faucibus, ut mattis augue convallis. Integer consequat feugiat turpis, ut cursus sem consectetur et. Nulla at libero nisl.
                    </div>
                  </div>

                  <div class="widget widget-friends">
                    <div class="widget-header">
                      <h3 class="widget-caption">Members</h3>
                    </div>
                    <div class="widget-body bordered-top  bordered-sky">
                      <div class="row">
                        <div class="col-md-12">
                          <ul class="img-grid" style="margin: 0 auto;">
                            @foreach ($group->users as $user)
                            <li>
                              <a href="../profile/{{$user->id}}">
                                <img src="../image/{{$user->image}}" alt="image">
                              </a>
                            </li>
                            @endforeach
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="list-group" id="recentPosts">
                      @foreach ($posts->slice(0, 3) as $post)
                            <a href="" class="list-group-item media">
                            <div class="pull-left">
                                <img class="avatar-img" src="\image\{{$post->poster->image}}" alt="">
                            </div>
                            <div class="media-body">
                                <div class="list-group__heading">{{$post->poster->name}}</div>
                                  <small class="list-group__text">{{$post->post}}</small>
                              </div>
                            </a>
                          @endforeach
                  </div>
                </div>




@endsection
