@extends('layout.home1')

@section('content')

    <?php $photo1=DB::table('users')->select('image')->where('id',Auth::id())->get(); ?>
    <?php $photo2=DB::table('users')->select('*')->where('id',$chatf[0]->id)->get(); ?>
    <div class="ms-body">
        <div class="action-header clearfix">
            <div class="visible-xs" id="ms-menu-trigger">
                <i class="fa fa-bars"></i>
            </div>
            <div class="pull-left hidden-xs">
                <img src="../image/{{$photo2[0]->image}}" alt="" class="img-avatar m-r-10">
                <div class="lv-avatar pull-left">
                </div>
                <span>{{$photo2[0]->name}}</span>
            </div>
            <ul class="ah-actions actions">
                <li>
                    <a href="">
                        <i class="fa fa-trash"></i>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-check"></i>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-clock-o"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="" data-toggle="dropdown" aria-expanded="true">
                        <i class="fa fa-sort"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a href="">Latest</a>
                        </li>
                        <li>
                            <a href="">Oldest</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="" data-toggle="dropdown" aria-expanded="true">
                        <i class="fa fa-bars"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a href="">Refresh</a>
                        </li>
                        <li>
                            <a href="">Message Settings</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        @foreach ($message as $msg)
        <?php $img= DB::table('users')->select('image')->where('id',$msg->send_id)->get(); ?>
        <?php  $flag=0; ?>
        <?php  $us= DB::table('users')->where('id',$msg->send_id)->get();
        if($us[0]->id==Auth::id()){
          $flag=1;
        }
        ?>
        @if($flag==0)
        <div class="message-feed media">

            <div class="pull-left">
                <img src="../image/{{$img[0]->image}}" alt="" class="img-avatar">
            </div>
            <div class="media-body">
                <div class="mf-content">
                    {{$msg->message}}
                <small class="mf-date"><i class="fa fa-clock-o"></i> {{$msg->created_at}}</small>
            </div>
        </div>
      </div>
     @else
        <div class="message-feed right">
            <div class="pull-right">
                <img src="../image/{{$img[0]->image}}" alt="" class="img-avatar">
            </div>
            <div class="media-body">
                <div class="mf-content">
                    {{$msg->message}}
                <small class="mf-date"><i class="fa fa-clock-o"></i> {{$msg->created_at}}</small>
            </div>
        </div>
      </div>
    @endif
    @endforeach
    <div class="lm">
      <input type="hidden" name="" value="">
    </div>
    </div>

    <form  class="msb-reply">
      {!! csrf_field() !!}
      <input type="hidden" id="recive" name="recive_id" value="{{$chatf[0]->id}}">
      <input type="hidden" id="send" name="send_id" value="{{Auth::id()}}">
      <input type="hidden" id="photo1" name="photo1" value="{{$photo1[0]->image}}">
      <input type="hidden" id="photo2" name="photo2" value="{{$photo2[0]->image}}">
      <textarea id="m" name="message" autocomplete="off" placeholder="What's on your mind..."></textarea><button type="submit"><i class="fa fa-paper-plane-o"></i></button>
    </form>
    <!-- <div class="tile tile-alt" id="messages-main">
      <div class="ms-menu">
          <div class="ms-user clearfix">
              <img src="../image/{{$photo2[0]->image}}" alt="" class="img-avatar pull-left">
              <div>Signed in as <br> {{$photo2[0]->email}}</div>
          </div>

          <div class="p-15">
              <div class="dropdown">
                  <a class="btn btn-azure btn-block" href="" data-toggle="dropdown">Messages <i class="caret m-l-5"></i></a>
                  <ul class="dropdown-menu dm-icon w-100">
                      <li><a href=""><i class="fa fa-envelope"></i> Messages</a></li>
                      <li><a href=""><i class="fa fa-users"></i> Contacts</a></li>
                      <li><a href=""><i class="fa fa-format-list-bulleted"> </i>Todo Lists</a></li>
                  </ul>
              </div>
          </div>

          <div class="list-group lg-alt">
            @foreach($freind1 as $fre1)
              <a class="list-group-item media" href="" style="background-color:#fff;">
                  <div class="pull-left">
                      <img src="../image/{{$fre1->image}}" alt="" class="img-avatar">
                  </div>
                  <div class="media-body">
                      <small class="list-group-item-heading">{{$fre1->name}}</small>
                      <small class="list-group-item-text c-gray">{{$fre1->email}}</small>
                  </div>
              </a>
            @endforeach
            @foreach($freind2 as $fre2)
              <a class="list-group-item media" href="" style="background-color:#fff;">
                  <div class="pull-left">
                      <img src="../image/{{$fre2->image}}" alt="" class="img-avatar">
                  </div>
                  <div class="media-body">
                      <small class="list-group-item-heading">{{$fre2->name}}</small>
                      <small class="list-group-item-text c-gray">{{$fre2->email}}</small>
                  </div>
              </a>
            @endforeach
          </div>


      </div>

      <div class="ms-body">
          <div class="action-header clearfix">
              <div class="visible-xs" id="ms-menu-trigger">
                  <i class="fa fa-bars"></i>
              </div>

              <div class="pull-left hidden-xs">
                  <img src="../image/{{$photo2[0]->image}}" alt="" class="img-avatar m-r-10">
                  <div class="lv-avatar pull-left">

                  </div>
                  <span>{{$photo2[0]->name}}</span>
              </div>

              <ul class="ah-actions actions">
                  <li>
                      <a href="">
                          <i class="fa fa-trash"></i>
                      </a>
                  </li>
                  <li>
                      <a href="">
                          <i class="fa fa-check"></i>
                      </a>
                  </li>
                  <li>
                      <a href="">
                          <i class="fa fa-clock-o"></i>
                      </a>
                  </li>
                  <li class="dropdown">
                      <a href="" data-toggle="dropdown" aria-expanded="true">
                          <i class="fa fa-sort"></i>
                      </a>

                      <ul class="dropdown-menu dropdown-menu-right">
                          <li>
                              <a href="">Latest</a>
                          </li>
                          <li>
                              <a href="">Oldest</a>
                          </li>
                      </ul>
                  </li>
                  <li class="dropdown">
                      <a href="" data-toggle="dropdown" aria-expanded="true">
                          <i class="fa fa-bars"></i>
                      </a>

                      <ul class="dropdown-menu dropdown-menu-right">
                          <li>
                              <a href="">Refresh</a>
                          </li>
                          <li>
                              <a href="">Message Settings</a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </div>

          @foreach ($message as $msg)
          <?php $img= DB::table('users')->select('image')->where('id',$msg->send_id)->get(); ?>
          <?php  $flag=0; ?>
          <?php  $us= DB::table('users')->where('id',$msg->send_id)->get();
          if($us[0]->id==Auth::id()){
            $flag=1;
          }
          ?>
          @if($flag==0)
          <div class="message-feed media">

              <div class="pull-left">
                  <img src="../image/{{$img[0]->image}}" alt="" class="img-avatar">
              </div>
              <div class="media-body">
                  <div class="mf-content">
                      {{$msg->message}}
                  <small class="mf-date"><i class="fa fa-clock-o"></i> {{$msg->created_at}}</small>
              </div>
          </div>
        </div>
       @else
          <div class="message-feed right">
              <div class="pull-right">
                  <img src="../image/{{$img[0]->image}}" alt="" class="img-avatar">
              </div>
              <div class="media-body">
                  <div class="mf-content">
                      {{$msg->message}}
                  <small class="mf-date"><i class="fa fa-clock-o"></i> {{$msg->created_at}}</small>
              </div>
          </div>
        </div>
      @endif
      @endforeach
      <div class="lm">
        <input type="hidden" name="" value="">
      </div>

      <form  class="msb-reply">
        {!! csrf_field() !!}
        <input type="hidden" id="recive" name="recive_id" value="{{$chatf[0]->id}}">
        <input type="hidden" id="send" name="send_id" value="{{Auth::id()}}">
        <input type="hidden" id="photo1" name="photo1" value="{{$photo1[0]->image}}">
        <input type="hidden" id="photo2" name="photo2" value="{{$photo2[0]->image}}">
        <textarea id="m" name="message" autocomplete="off" placeholder="What's on your mind..."></textarea><button type="submit"><i class="fa fa-paper-plane-o"></i></button>
      </form>
      </div>
      </div> -->
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        var socket = io.connect('https://intense-basin-28181.herokuapp.com');

        jQuery(document).ready(function($){
          var x;
          var rec=$('#recive').val();
        $('form').submit(function(e){
          e.preventDefault();
          console.log($('#m').val());
          $.ajax({
            type:'post',
            url:'\\insertmessage',
            data:{
              message:$('#m').val(),
              recive_id:$('#recive').val(),
              send_id:$('#send').val(),
            },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success : function (data){
              x=data.created_at;
               console.log(data);
               console.log(x);
            },
          });
          socket.emit('chat message', {
            message:$('#m').val(),
            recive_id:$('#recive').val(),
            send_id:$('#send').val()
          });
          $('#m').val('');
          return false;
        });
        socket.on('chat message', function(message){
          if(message.recive_id==$('#send').val()||message.send_id==$('#send').val()){
            if(message.send_id==$('#send').val()){
              var x='<div class="message-feed right">'+
                '  <div class="pull-right">'+
                      '<img src="../image/'+$('#photo1').val()+'" alt="" class="img-avatar">'+
                  '</div>'+
                  '<div class="media-body">'+
                      '<div class="mf-content">'+
                          ''+message.message+''+
                    '  <small class="mf-date"><i class="fa fa-clock-o"></i> '+new Date().toLocaleTimeString('en-US', { hour12: true,
                                             hour: "numeric",
                                             minute: "numeric"});+'</small>'+
                  '</div>'+
              '</div>'+
            '</div>';}
            else if(message.recive_id==$('#send').val()){
              var x='<div class="message-feed media">'+
                '  <div class="pull-left">'+
                      '<img src="../image/'+$('#photo2').val()+'" alt="" class="img-avatar">'+
                  '</div>'+
                  '<div class="media-body">'+
                      '<div class="mf-content">'+
                          ''+message.message+''+
                    '  <small class="mf-date"><i class="fa fa-clock-o"></i> '+new Date().toLocaleTimeString('en-US', { hour12: true,
                                             hour: "numeric",
                                             minute: "numeric"});+'</small>'+
                  '</div>'+
              '</div>'+
            '</div>';

        }
      $('.lm').before(x);
    }
        });
      });
    </script>
@endsection
