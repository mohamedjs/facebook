@extends('layout.home1')

@section('content')
<div class="col-md-10 ">
  <div class="conect" style="height:auto;">
      <ul class="nav navbar-nav">
        @if($name=='add')
        @foreach ($users as $user1)
        @if($user->id!=$user1->id)
          <li>
            <a href=""><div class="freind_image">
              <img src="../image/{{$user1->image}}" alt="">
            </div></a>
            <div class="freind_content">
              <h2>{{$user1->name}}</h2>
              <p>{{$user1->gender}}</p>
            </div>
            <button type="button" id="addf{{$user1->id}}" name="button" onclick="add_freind('{{$user1->id}}')" class="btn btn-default">+ add freind</button>
          </li>
          @endif
          @endforeach

          @elseif($name=='send')
          @foreach ($add_freind as $user1)
          @if($user->id!=$user1->id)
            <li>
              <a href=""><div class="freind_image">
                <img src="../image/{{$user1->image}}" alt="">
              </div></a>
              <div class="freind_content">
                <h2>{{$user1->name}}</h2>
                <p>{{$user1->gender}}</p>
              </div>
              <button type="button" id="ref{{$user1->id}}" name="button" onclick="remove_freind_send('{{$user1->id}}')" class="btn btn-default">+ freind rquest send</button>
            </li>
            @endif
            @endforeach

            @else
            @foreach ($freind_request as $coo1)
              <li>
                <div class="row" style="width:103%;">
                <div class="col-md-2">
                  <a class="avatar-img" href="{{$coo1}}" id=""><img src="../image/{{$coo1->image}}" alt=""></a>
                </div>
                <div class="col-md-4">
                  <a href=""><h2>{{$coo1->name}}</h2></a>
                </div>
                <div class="col-md-3">
                  <button type="button" id="addff{{$coo1->id}}" name="button" onclick="addff('{{$coo1->id}}')" class="btn btn-default">Accept</button>
                </div>
                <div class="col-md-3">
                  <button type="button" id="deletf{{$coo1->id}}" name="button" onclick="deletf('{{$coo1->id}}')" class="btn btn-default">ignore</button>
               </div>
             </div>
              </li>
              @endforeach
              @endif
      </ul>
  </div>
</div>
@endsection
