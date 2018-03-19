@extends('layout.home1')

@section('content')
  <div class="col-md-3">
      <div class="profile-nav">
        <div class="widget">
          <div class="widget-body">
            <div class="user-heading round">
              <a href="#">
                  <img src="../image/{{$user->image}}" alt="">
              </a>
              <h1>{{$user->name}}</h1>
              <p>@username</p>
            </div>

            <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="#"> <i class="fa fa-user"></i> News feed</a></li>
              <li>
                <a href="#">
                  <i class="fa fa-envelope"></i> Messages
                  <span class="label label-info pull-right r-activity">9</span>
                </a>
              </li>
              <li><a href="#"> <i class="fa fa-calendar"></i> Events</a></li>
              <li><a href="#"> <i class="fa fa-image"></i> Photos</a></li>
              <li><a href="#"> <i class="fa fa-share"></i> Browse</a></li>
              <li><a href="#"> <i class="fa fa-floppy-o"></i> Saved</a></li>
            </ul>
          </div>
        </div>

        <div class="widget">
          <div class="widget-body">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="#"> <i class="fa fa-globe"></i> Pages</a></li>
              <li><a href="#"> <i class="fa fa-gamepad"></i> Games</a></li>
              <li><a href="#"> <i class="fa fa-puzzle-piece"></i> Ads</a></li>
              <li><a href="#"> <i class="fa fa-home"></i> Markerplace</a></li>
              <li><a href="#"> <i class="fa fa-users"></i> Groups</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div><!-- end left links -->
        <div class="col-md-6">
          <div class="box profile-info n-border-top">
            <form method="post" id="postform" enctype="multipart/form-data" action="#">
                {{csrf_field()}}
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
                <img class="img-circle" src="image/{{$post->poster->image}}" alt="User Image">
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
                <img class="img-circle img-sm" src="image/{{$comment->user->image}}" alt="User Image">
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

        <div class="col-md-3 hidden-xs hidden-sm">
          <div class="widget">
            <div class="widget-header">
              <h3 class="widget-caption">People You May Know</h3>
            </div>
            <div class="widget-body bordered-top bordered-sky">
              <div class="carde">
                  <div class="content">
                      <ul class="list-unstyled team-members">
                      @foreach ($users->slice(0,5) as $co)
                      @if($co->id != $user->id)
                          <li>
                              <div class="row">
                                  <div class="col-xs-3">
                                      <div class="avatar">
                                          <img src="image/{{$co->image}}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                      </div>
                                  </div>
                                  <div class="col-xs-6">
                                     {{$co->name}}
                                  </div>

                                  <div class="col-xs-3 text-right">
                                      <btn class="btn btn-sm btn-azure btn-icon" id="addf{{$co->id}}" name="button" onclick="add_freind({{$co->id}})"><i class="fa fa-user-plus" id="ref{{$co->id}}"></i></btn>
                                  </div>
                              </div>
                          </li>
                          @endif
                          @endforeach
                      </ul>
                  </div>
              </div>
            </div>
          </div><!-- End people yout may know -->
          <div class="widget">
            <div class="widget-header">
              <h3 class="widget-caption">Friends activity</h3>
            </div>
            <div class="widget-body bordered-top bordered-sky">
              <div class="carde">
                <div class="content">
                   <ul class="list-unstyled team-members">
                   @foreach ($posts->slice(0,3) as $post)
                    <li>
                      <div class="row">
                        <div class="col-xs-3">
                          <div class="avatar">
                              <img src="image/{{$post->poster->image}}" alt="img" class="img-circle img-no-padding img-responsive">
                          </div>
                        </div>
                        <div class="col-xs-9">
                          <b><a href="#">{{$post->poster->name}}</a></b> shared a
                          <b><a href="#">publication</a></b>.
                          <span class="timeago">{{$post->created_at}}</span>
                        </div>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div><!-- End Friends activity -->
          <div class="groups">

          </div>
        </div>

    @endsection
