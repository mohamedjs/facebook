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
  <div class="col-md-10">
    <div class="card">
      <div class="card__body">
        <form role="form" action="\creategro" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
              <input type="text" name="gname" class="form-control" placeholder="Enter Group Name">
              <i class="form-group__bar"></i>
          </div>
          <div class="form-group">
            <input type="file" name="gphoto" class="form-control" placeholder="Enter Group Name">
            <i class="form-group__bar"></i>
         </div>
         <br>
          <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
  </div>
  </div>
@endsection
