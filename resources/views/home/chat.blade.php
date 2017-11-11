@extends('layout.home1')

@section('content')
<div class="col-md-6 scroll">
  <?php $photo1=DB::table('users')->select('image')->where('id',Auth::id())->get(); ?>
  <?php $photo2=DB::table('users')->select('image')->where('id',$chatf[0]->id)->get(); ?>
    <ul id="messages" style="overflow-y: scroll;max-height: 480px;width: 172%;">
      @foreach ($message as $msg)
      <li>
        <a href="">
          <?php $img= DB::table('users')->select('image')->where('id',$msg->send_id)->get();?>
          <img src="../image/{{$img[0]->image}}" style="width:30px;height:30px;border-radius:50%;">
        </a><p>{{$msg->message}}</p>
      </li>
      @endforeach
    </ul>
    <form action="" class="form-chat">
      <input type="hidden" id="recive" name="recive" value="{{$chatf[0]->id}}">
      <input type="hidden" id="send" name="send" value="{{Auth::id()}}">
      <input type="hidden" id="photo" name="photo" value="{{$photo1[0]->image}}">
      <input id="m" autocomplete="off" /><button class="chat-send">Send</button>
    </form>
  </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        var socket = io.connect('http://localhost:8888');

        jQuery(document).ready(function($){
          var rec=$('#recive').val();
        $('form').submit(function(){
          socket.emit('chat message', {
            msg:$('#m').val(),
            recive:$('#recive').val(),
            send:$('#send').val()
          });
          $('#m').val('');
          return false;
        });
        socket.on('chat message', function(data){
          if(data.recive==$('#send').val()){
          $('#messages').append('<li><a href="profile/'+data.recive+'"><img src="../image/'+$('#photo').val()+'" style="width:30px;height:30px;border-radius:50%;"></a>'+data.msg+'</li>');
          }
        });
      });
    </script>
@endsection
