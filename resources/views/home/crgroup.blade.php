@extends('layout.home1')

@section('content')
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
