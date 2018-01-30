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
          <li class="active"><a href="../about"><i class="fa fa-fw fa-user"></i> About</a></li>
          <li><a href="../allfreind"><i class="fa fa-fw fa-users"></i> Friends</a></li>
          <li><a href="photos1.html"><i class="fa fa-fw fa-image"></i> Photos</a></li>
        </ul>
      </div>
    </div>
  </div>
        <div class="col-md-12">
            <div class="widget">
            <div class="widget-body">
            <div class="row">
              <div class="col-md-4 col-md-5 col-xs-12">
                <div class="row content-info">
                  <div class="col-xs-3">
                    Email:
                  </div>
                  <div class="col-xs-9">
                    {{$user->email}}
                  </div>
                  <div class="col-xs-3">
                    Phone:
                  </div>
                  <div class="col-xs-9">
                    {{$user->phone}}
                  </div>
                  <div class="col-xs-3">
                    Address:
                  </div>
                  <div class="col-xs-9">
                    {{$user->address}}
                  </div>
                  <div class="col-xs-3">
                    Birthday:
                  </div>
                  <div class="col-xs-9">
                    {{$user->birhtdata}}
                  </div>
                  <div class="col-xs-3">
                    URL:
                  </div>
                  <div class="col-xs-9">
                    http://yourdomain.com
                  </div>
                  <div class="col-xs-3">
                   Job:
                  </div>
                  <div class="col-xs-9">
                    {{$user->job}}
                  </div>
                  <div class="col-xs-3">
                   Lives in:
                  </div>
                  <div class="col-xs-9">
                    {{$user->address}}
                  </div>
                </div>
              </div>
              <div class="col-lg-8 col-md-7 col-xs-12">
                <p class="contact-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
              </div>
            </div>
          </div>
          </div>
          </div>
@endsection
