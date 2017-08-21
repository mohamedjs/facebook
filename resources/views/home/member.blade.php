@extends('layout.home1')

@section('content')
  <div class="col-md-10">
    <div class="card">
      <div class="card__body">
      <ul>
        @foreach ($groups->users as $user)
          <li>{{$user->name}}</li>
        @endforeach
      </ul>
    </div>
  </div>
  </div>
@endsection
