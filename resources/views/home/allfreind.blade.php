@extends('layout.home1')

@section('content')
<div class="col-md-12">
    <div class="cover profile">
      <div class="wrapper">
        <div class="image">
          <img src="../image/{{$user->cover}}" class="show-in-modal" alt="people">
        </div>
        <ul class="friends">
          @foreach($freind1 as $fre1)
          <li>
            <a href="../profile/{{$fre1->id}}">
              <img src="../image/{{$fre1->image}}" alt="people" class="img-responsive">
            </a>
          </li>
          @endforeach
          @foreach($freind2 as $fre2)
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
          <img src="../image/{{$user->image}}" alt="people">
        </div>
        <div class="name"><a href="#">{{$user->name}}.</a></div>
        <ul class="cover-nav">
          <li><a href="../profile/{{$user->id}}"><i class="fa fa-fw fa-bars"></i> Timeline</a></li>
          <li><a href="../about"><i class="fa fa-fw fa-user"></i> About</a></li>
          <li class="active"><a href="../allfreind"><i class="fa fa-fw fa-users"></i> Friends</a></li>
          <li><a href="photos1.html"><i class="fa fa-fw fa-image"></i> Photos</a></li>
        </ul>
      </div>
    </div>
  </div>
  @foreach($freind1 as $fre1)
       <div class="col-md-3">
              <div class="contact-box center-version">
                <a href="../profile/{{$fre1->id}}">
                  <img alt="image" class="img-circle" src="../image/{{$fre1->image}}">
                  <h3 class="m-b-xs"><strong>{{$fre1->name}}</strong></h3>

                  <div class="font-bold">{{$fre1->birhtdata}}</div>
                </a>
                <div class="contact-box-footer">
                  <div class="m-t-xs btn-group">
                    <a href="../chat/{{$fre1->id}}" class="btn btn-xs btn-white"><i class="fa fa-envelope"></i>Send Messages</a>
                    <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                  </div>
                </div>
              </div>
          </div>
        @endforeach
        @foreach($freind2 as $fre2)
           <div class="col-md-3">
                  <div class="contact-box center-version">
                    <a href="../profile/{{$fre2->id}}">
                      <img alt="image" class="img-circle" src="../image/{{$fre2->image}}">
                      <h3 class="m-b-xs"><strong>{{$fre2->name}}</strong></h3>

                      <div class="font-bold">{{$fre2->birhtdata}}</div>
                    </a>
                    <div class="contact-box-footer">
                      <div class="m-t-xs btn-group">
                        <a href="../chat/{{$fre2->id}}" class="btn btn-xs btn-white"><i class="fa fa-envelope"></i>Send Messages</a>
                        <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                      </div>
                    </div>
                  </div>
              </div>
              @endforeach
@endsection
