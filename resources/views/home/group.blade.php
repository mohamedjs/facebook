@extends('layout.home1')

@section('content')
  <div class="col-md-6">
    <input type="hidden" id="group_id" value="{{$group->id}}">
    <div class="group_head" style="background-image: url('../image/{{$group->group_name}}.jpg');">
      <h2>{{$group->group_name}}</h2>
      <button type="button" name="button" class="follow btn btn-default">Follow</button>
      <button type="button" name="button" class="like_page btn btn-default"><i class="fa fa-thumbs-up fa-2x"></i></button>
      <button type="button" name="button" class="mesage_page btn btn-default"><i class="fa fa-comments-o fa-2x"></i></button>
    </div>
    <div class="card wall__posting">
      <form method="post" id="postform">
        {{csrf_field()}}
        <textarea class="form-control textarea-autosize" placeholder="Write Something..."
                  id="postContent" name="postContent"></textarea>
        <div class="wall__actions">
            <div class="wall__actions__items">
                <a href=""><i class="fa fa-file-image-o"></i></a>
                <a href=""><i class="fa fa-play-circle"></i></a>
                <a href=""><i class="fa fa-link"></i></a>
            </div>
            <input type="hidden" id="group_id" name="group_id" value="{{$group->id}}">
            <button type="submit" class="wall__actions__btn btn btn-default" id="postbtn">Post</button>
        </div>
      </form>
    </div>
    <div class="postscontainer" id="pContainer">
      @foreach ($posts as $post)
        <div class="card">
          <div class="card__header">
           <div class="media">
              <div class="pull-left">
                  <img class="avatar-img" src="../image/{{$post->poster->image}}" alt="">
              </div>
              <div class="media-body">
                  <h2>{{$post->poster->name}}<small>Posted on {{$post->created_at}}</small></h2>
              </div>
          </div>
      </div>
      <div class="card__body">
          <p>{{$post->post}}</p>
          <div class="wall__attrs">
              <div class="wall__stats">
                <span><i class="fa fa-comments"></i> <a id="coment{{$post->id}}"><?php echo count($post->comments); ?></a></span>
                <span><i class="fa fa-heart act" id="{{$post->id}}" po-id="{{$post->id}}"></i> <a id="like{{$post->id}}"> <?php echo count($post->likes); ?></a></span>
              </div>
              <div class="wall__people hidden-xs image{{$post->id}}" pos-id="{{$post->id}}">
                @foreach ($post->likes as $like)
                  <a href="{{$like->user_id}}"><img src="../image/{{$like->user->image}}" alt=""></a>
                @endforeach
              </div>
          </div>
      </div>
      <div class="wall__comments">
          <div class="wall__comments__lists {{$post->id}}">
            @foreach ($post->comments as $comment)
            <div class="media" id="comment{{$comment->id}}">
                <a href="" class="pull-left"><img src="../image/{{$Comment->user->image}}" alt="" class="avatar-img"></a>
                <div class="media-body">
                  <a>{{$comment->user->name}}</a> <small class="m-l-10">{{$comment->created_at}}</small>
                  <p id="com{{$comment->id}}">{{$comment->comment}}</p>
                  <div class="actions">
                      <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          <i class="fa fa-play-circle fa-2x"></i></a>
                          <ul class="dropdown-menu pull-right" role="menu">
                              <li><a onclick="updataComment({{$comment->id}})" id="updata{{$comment->id}}">updata</a></li>
                              <li><a onclick="deleteComment({{$comment->id}})" id="delet{{$comment->id}}">Delete</a></li>
                          </ul>
                      </div>
                  </div>
                </div>
            </div>
                @endforeach
              </div>
          <form class="wall__comments__input">
            {{csrf_field()}}
              <textarea class="textarea-autosize submit_on_enter" id="input{{$post->id}}" p-id="{{$post->id}}" placeholder="Write something..."></textarea>
          </form>
      </div>
    </div>
    @endforeach
  </div>
  </div>
  <div class="col-md-4">
    <div class="card">
            <div class="card__header">
                <h2>{{$group->group_name}}</h2>
            </div>
            <div class="card__body">
              <a href="\joinRequests\{{$group->id}}">join requests</a>
              <br>
              <a href="\memmbers\{{$group->id}}">Memmebers</a>
            </div>
        </div>
        <div class="card widget-pictures">
            <div class="card__header">
                <h2>Augue laoreet rutrum <small>Cras congue nec lorem eget posuere</small></h2>
            </div>
            <div class="widget-pictures__body">
              <a href="" class="col-xs-3">
                  <img  src="\image\1.jpg" alt="">
              </a>
                <a href="" class="col-xs-3">
                  <img c src="\image\1.jpg" alt="">
                </a>
                <a href="" class="col-xs-3">
                    <img  src="\image\1.jpg" alt="">
                </a>

                <a href="" class="col-xs-3">
                    <img  src="\image\1.jpg" alt="">
                </a>

                <a href="" class="col-xs-3">
                    <img  src="\image\1.jpg" alt="">
                </a>

                <a href="" class="col-xs-3">
                    <img  src="\image\1.jpg" alt="">
                </a>

                <a href="" class="col-xs-3">
                    <img  src="\image\1.jpg" alt="">
                </a>

                <a href="" class="col-xs-3">
                    <img  src="\image\1.jpg" alt="">
                </a>

                <a href="" class="col-xs-3">
                    <img  src="\image\1.jpg" alt="">
                </a>

                <a href="" class="col-xs-3">
                    <img  src="\image\1.jpg" alt="">
                </a>

                <a href="" class="col-xs-3">
                    <img  src="\image\1.jpg" alt="">
                </a>

                <a href="" class="col-xs-3">
                    <img  src="\image\1.jpg" alt="">
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card__header">
                <h2>Recent Posts <small>Commodo vel pharetra nisi. Donec velit libero</small></h2>
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
              <a href="" class="view-more">
                  <i class="fa fa-long-arrow-right"></i> View all
              </a>
          </div>
  </div>
@endsection
