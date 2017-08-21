@extends('layout.home1')

@section('content')
  <div class="col-md-10">
    <div class="card">
      <div class="card__body">
          <div class="list-group" id="recentPosts">
            @foreach ($groups as $group)
            <div class="col-md-6">
                  <a href="../gro/{{$group->id}}" class="list-group-item media">
                  <div class="pull-left">
                      <img class="avatar-img" src="../image/{{$group->group_name}}.jpg" alt="">
                  </div>
                  <div class="media-body">
                      <div class="list-group__heading">{{$group->group_name}}</div>
                        <small class="list-group__text">{{$group->group_name}}</small>
                    </div>
                  </a>
            </div>
            @endforeach
        </div>
    </div>
  </div>
  </div>
@endsection
