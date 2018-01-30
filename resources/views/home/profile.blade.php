@extends('layout.home1')

@section('content')
      <div class="col-md-12">
          <div class="cover profile">
            <div class="wrapper">
              <div class="image">
                <img src="../image/{{$pruser->cover}}" class="show-in-modal" alt="people">
              </div>
              <ul class="friends">
                @foreach($prfreind1 as $fre1)
                <li>
                  <a href="../profile/{{$fre1->id}}">
                    <img src="../image/{{$fre1->image}}" alt="people" class="img-responsive">
                  </a>
                </li>
                @endforeach
                @foreach($prfreind2 as $fre2)
                <li>
                  <a href="../profile/{{$fre2->id}}">
                    <img src="../image/{{$fre2->image}}" alt="people" class="img-responsive">
                  </a>
                </li>
                @endforeach
              </ul>
            </div>
            <div class="cover-info">
              <div class="avatar">
                <img src="../image/{{$pruser->image}}" alt="people">
              </div>
              <div class="name"><a href="#">{{$pruser->name}}.</a></div>
              <ul class="cover-nav">
                <li class="active"><a href="../profile/{{$pruser->id}}"><i class="fa fa-fw fa-bars"></i> Timeline</a></li>
                <li><a href="../about"><i class="fa fa-fw fa-user"></i> About</a></li>
                <li><a href="../allfreind"><i class="fa fa-fw fa-users"></i> Friends</a></li>
                <li><a href="photos1.html"><i class="fa fa-fw fa-image"></i> Photos</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4">
                  <div class="widget">
                    <div class="widget-header">
                      <h3 class="widget-caption">About</h3>
                    </div>
                    <div class="widget-body bordered-top bordered-sky">
                      <ul class="list-unstyled profile-about margin-none">
                        <li class="padding-v-5">
                          <div class="row">
                            <div class="col-sm-4"><span class="text-muted">Date of Birth</span></div>
                            <div class="col-sm-8">{{$pruser->birhtdata}}</div>
                          </div>
                        </li>
                        <li class="padding-v-5">
                          <div class="row">
                            <div class="col-sm-4"><span class="text-muted">Job</span></div>
                            <div class="col-sm-8">{{$pruser->job}}</div>
                          </div>
                        </li>
                        <li class="padding-v-5">
                          <div class="row">
                            <div class="col-sm-4"><span class="text-muted">Gender</span></div>
                            <div class="col-sm-8">{{$pruser->gender}}</div>
                          </div>
                        </li>
                        <li class="padding-v-5">
                          <div class="row">
                            <div class="col-sm-4"><span class="text-muted">Lives in</span></div>
                            <div class="col-sm-8">{{$pruser->address}}</div>
                          </div>
                        </li>
                        <li class="padding-v-5">
                          <div class="row">
                            <div class="col-sm-4"><span class="text-muted">phone</span></div>
                            <div class="col-sm-8">{{$pruser->phone}}</div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>

                  <div class="widget widget-friends">

                    <div class="widget-header">
                      <h3 class="widget-caption">Friends</h3>
                    </div>
                    <div class="widget-body bordered-top  bordered-sky">
                      <div class="row">
                        <div class="col-md-12">
                          <ul class="img-grid" style="margin: 0 auto;">
                            @foreach($prfreind1 as $fre1)
                            <li>
                              <a href="../profile/{{$fre1->id}}">
                                <img src="../image/{{$fre1->image}}" alt="people" class="img-responsive">
                              </a>
                            </li>
                            @endforeach
                            @foreach($prfreind2 as $fre2)
                            <li>
                              <a href="../profile/{{$fre2->id}}">
                                <img src="../image/{{$fre2->image}}" alt="people" class="img-responsive">
                              </a>
                            </li>
                            @endforeach
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="widget">
                    <div class="widget-header">
                      <h3 class="widget-caption">Groups</h3>
                    </div>
                    <div class="widget-body bordered-top bordered-sky">
                      <div class="carde">
                        <div class="content">
                          <ul class="list-unstyled team-members">
                            @foreach ($pruser->creator as $group)
                            <li>
                              <div class="row">
                                  <div class="col-xs-3">
                                      <div class="avatar">
                                        <a href="../gro/{{$group->id}}">  <img src="../image/{{$group->group_name}}.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive"></a>
                                      </div>
                                  </div>
                                  <div class="col-xs-6">
                                     {{$group->group_name}}
                                  </div>

                                  <div class="col-xs-3 text-right">
                                      <btn class="btn btn-sm btn-azure btn-icon"><i class="fa fa-user"></i></btn>
                                  </div>
                              </div>
                            </li>
                            @endforeach
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

        <div class="col-md-6">
          <div class="box profile-info n-border-top">
            <form method="post" id="postform">
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

        <div class="col-md-4 hidden-xs hidden-sm">

        </div>
    @endsection
