@extends('layout.home1')

@section('content')
<div class="col-md-10 ">
  <div class="conect" style="height:auto;">
      <ul class="nav navbar-nav">
        @foreach ($connect as $user)
          <li>
            <a href=""><div class="freind_image">
              <img src="../image/{{$user->image}}" alt="">
            </div></a>
            <div class="freind_content">
              <h2>{{$user->name}}</h2>
              <p>{{$user->gender}}</p>
            </div>
            <button type="button" id="addf{{$user->id}}" name="button" onclick="add_freind({{$user->id}})" class="btn btn-default">+ add freind</button>
          </li>
          @endforeach
      </ul>
  </div>
</div>
@endsection
