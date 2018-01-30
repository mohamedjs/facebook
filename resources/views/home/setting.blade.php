@extends('layout.home1')

@section('content')
<div class="col-md-12">
    <div class="cover profile">
      <div class="wrapper">
        <div class="image">
          <img src="../image/{{$user->image}}" id="cover" class="show-in-modal" alt="people">
        </div>
        <ul class="friends">
          @foreach($freind1 as $fre1)
          <li>
            <a href="../profile/{{$fre1->id}}">
              <img src="../image/{{$fre1->image}}"  alt="people" class="img-responsive">
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
          <img src="../image/{{$user->image}}" id="profile1" alt="people">
        </div>
        <div class="name"><a href="#">{{$user->name}}.</a></div>
        <ul class="cover-nav">
          <li class="active"><a href="../profile/{{$user->id}}"><i class="fa fa-fw fa-bars"></i> Timeline</a></li>
          <li><a href="../about"><i class="fa fa-fw fa-user"></i> About</a></li>
          <li><a href="../allfreind"><i class="fa fa-fw fa-users"></i> Friends</a></li>
          <li><a href="photos1.html"><i class="fa fa-fw fa-image"></i> Photos</a></li>
        </ul>
      </div>
    </div>
  </div>
<div class="container page-content edit-profile">
<div class="row">
<div class="col-md-10 col-md-offset-1">
    <!-- NAV TABS -->
  <ul class="nav nav-tabs nav-tabs-custom-colored tabs-iconized">
    <li class="active"><a href="#profile-tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-user"></i> Profile</a></li>
    <li class=""><a href="#activity-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-rss"></i> Recent Activity</a></li>
    <li class=""><a href="#settings-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-gear"></i> Settings</a></li>
  </ul>
  <!-- END NAV TABS -->
  <div class="tab-content profile-page">
    <!-- PROFILE TAB CONTENT -->
    <div class="tab-pane profile active" id="profile-tab">
      <div class="row">
        <div class="col-md-3">
          <div class="user-info-left">
            <img src="../image/{{$user->image}}" id="profile2" alt="Profile Picture" style="width:116px;height:116px;">
            <h2>{{$user->name}}.</h2>
            <div class="contact">
              <p>
                <span class="file-input btn btn-azure btn-file">
                  Change Avatar   <form id="u-p-f" enctype="multipart/form-data"  role="form" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                      <input type="file" name="profile_picture" id="pr-image" multiple="">
                    </form>
                </span>
              </p>
              <p>
                <span class="file-input btn btn-azure btn-file">
                  Change Cover  <form id="u-c-f"enctype="multipart/form-data"  role="form" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}">
                      <input type="file" name="cover_picture" id="cr-image" multiple="">
                    </form>
                </span>
              </p>
              <ul class="list-inline social">
                <li><a href="#" title="Facebook"><i class="fa fa-facebook-square"></i></a></li>
                <li><a href="#" title="Twitter"><i class="fa fa-twitter-square"></i></a></li>
                <li><a href="#" title="Google Plus"><i class="fa fa-google-plus-square"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="user-info-right">
            <div class="basic-info">
              <h3><i class="fa fa-square"></i> Basic Information</h3>
              <form  id="editprofile" method="post">
              <p class="data-row">
                <span class="data-name">
                  <input type="text" name="user_name" value="" placeholder="username" style="color:#000;">
                </span>
                <span class="data-value">{{$user->name}}</span>
              </p>
              <p class="data-row">
                <span class="data-name">
                  <input type="date" name="birhtdata" value="" placeholder="data-of_birth" style="color:#000;">
                </span>
                <span class="data-value">{{$user->birhtdata}}</span>
              </p>
              <p class="data-row">
                <span class="data-name">
                  <input type="text" name="gender" value="" placeholder="gender" style="color:#000;">
                </span>
                <span class="data-value">{{$user->gender}}</span>
              </p>
              <p class="data-row">
                <span class="data-name">
                  <input type="text" name="job" value="" placeholder="job" style="color:#000;">
                </span>
                <span class="data-value"><a href="#">{{$user->job}}</a></span>
              </p>
              <p class="data-row">
                <span class="data-name">
                  <input type="email" name="email" value="" placeholder="email" style="color:#000;">
                </span>
                <span class="data-value">{{$user->email}}</span>
              </p>
              <p class="data-row">
                <span class="data-name">
                  <input type="text" name="phone" value="" placeholder="phone" style="color:#000;">
                </span>
                <span class="data-value">{{$user->phone}}</span>
              </p>
              <p class="data-row">
                <span class="data-name">
                  <input type="text" name="address" value="" placeholder="address" style="color:#000;">
                </span>
                <span class="data-value">{{$user->address}}</span>
              </p>
              <button type="submit"  class="btn btn-primary" style="width:60%;" name="button">Edit</button>
            </form>
            </div>
            <div class="about">
              <h3><i class="fa fa-square"></i> About Me</h3>
              <p>Dramatically facilitate proactive solutions whereas professional intellectual capital. Holisticly utilize competitive e-markets through intermandated meta-services. Objectively.</p>
              <p>Monotonectally foster future-proof infomediaries before principle-centered interfaces. Assertively recaptiualize cutting-edge web services rather than emerging "outside the box" thinking. Phosfluorescently cultivate resource maximizing technologies and user-centric convergence. Completely underwhelm cross functional innovation vis-a-vis.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END PROFILE TAB CONTENT -->

    <!-- ACTIVITY TAB CONTENT -->
    <div class="tab-pane activity" id="activity-tab">
      <ul class="list-unstyled activity-list">
        <li>
          <i class="fa fa-times activity-icon pull-left"></i>
          <p>
            <a href="#">Jonathan</a> commented on <a href="#">Special Deal 2013</a> <span class="timestamp">12 minutes ago</span>
          </p>
        </li>
        <li>
          <i class="fa fa-times activity-icon pull-left"></i>
          <p>
            <a href="#">Jonathan</a> posted <a href="#">a new blog post</a> <span class="timestamp">4 hours ago</span>
          </p>
        </li>
        <li>
          <i class="fa fa-times activity-icon pull-left"></i>
          <p>
            <a href="#">Jonathan</a> edited his profile <span class="timestamp">11 hours ago</span>
          </p>
        </li>
        <li>
          <i class="fa fa-times activity-icon pull-left"></i>
          <p>
            <a href="#">Jonathan</a> has added review on <a href="#">jQuery Complete Guide</a> book <span class="timestamp">Yesterday</span>
          </p>
        </li>
        <li>
          <i class="fa fa-times activity-icon pull-left"></i>
          <p>
            <a href="#">Jonathan</a> liked <a href="#">a post</a> <span class="timestamp">December 12</span>
          </p>
        </li>
        <li>
          <i class="fa fa-times activity-icon pull-left"></i>
          <p>
            <a href="#">Jonathan</a> has completed one task <span class="timestamp">December 11</span>
          </p>
        </li>
        <li>
          <i class="fa fa-times activity-icon pull-left"></i>
          <p>
            <a href="#">Jonathan</a> uploaded <a href="#">new photos</a> <span class="timestamp">December 5</span>
          </p>
        </li>
        <li>
          <i class="fa fa-times activity-icon pull-left"></i>
          <p>
            <a href="#">Jonathan</a> has updated his credit card info <span class="timestamp">September 28</span>
          </p>
        </li>
      </ul>
      <p class="text-center more"><a href="#" class="btn btn-custom-primary">View more <i class="fa fa-long-arrow-right"></i></a></p>
    </div>
    <!-- END ACTIVITY TAB CONTENT -->

    <!-- SETTINGS TAB CONTENT -->
    <div class="tab-pane settings" id="settings-tab">
      <form class="form-horizontal" role="form">
        <fieldset>
          <h3><i class="fa fa-square"></i> Change Password</h3>
          <div class="form-group">
            <label for="old-password" class="col-sm-3 control-label">Old Password</label>
            <div class="col-sm-4">
              <input type="password" id="old-password" name="old-password" class="form-control">
            </div>
          </div>
          <hr>
          <div class="form-group">
            <label for="password" class="col-sm-3 control-label">New Password</label>
            <div class="col-sm-4">
              <input type="password" id="password" name="password" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="password2" class="col-sm-3 control-label">Repeat Password</label>
            <div class="col-sm-4">
              <input type="password" id="password2" name="password2" class="form-control">
            </div>
          </div>
        </fieldset>
        <fieldset>
          <h3><i class="fa fa-square"></i> Privacy</h3>
          <div class="checkbox">
            <label>
                <input type="checkbox" class="colored-blue" checked="checked">
                <span class="text">Show my display name</span>
            </label>
          </div>
          <div class="checkbox">
            <label>
                <input type="checkbox" class="colored-blue" checked="checked">
                <span class="text">Show my birth date</span>
            </label>
          </div>
          <div class="checkbox">
            <label>
                <input type="checkbox" class="colored-blue" checked="checked">
                <span class="text">Show my email</span>
            </label>
          </div>
          <div class="checkbox">
            <label>
                <input type="checkbox" class="colored-blue" checked="checked">
                <span class="text">Show my online status on chat</span>
            </label>
          </div>
        </fieldset>
        <h3><i class="fa fa-square"> </i>Notifications</h3>
        <fieldset>
          <div class="checkbox">
            <label>
                <input type="checkbox" class="colored-blue" checked="checked">
                <span class="text">Receive message from administrator</span>
            </label>
          </div>

          <div class="checkbox">
            <label>
                <input type="checkbox" class="colored-blue" checked="checked">
                <span class="text">New product has been added</span>
            </label>
          </div>

          <div class="checkbox">
            <label>
                <input type="checkbox" class="colored-blue" checked="checked">
                <span class="text">Product review has been approved</span>
            </label>
          </div>

          <div class="checkbox">
            <label>
                <input type="checkbox" class="colored-blue" checked="checked">
                <span class="text">Others liked your post</span>
            </label>
          </div>
        </fieldset>
      </form>
      <p class="text-center"><a href="#" class="btn btn-custom-primary"><i class="fa fa-floppy-o"></i> Save Changes</a></p>
    </div>
    <!-- END SETTINGS TAB CONTENT -->
  </div>
</div>
</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $('#editprofile').submit(function(e){
      e.preventDefault();
      $.ajax({
        type:"post",
        url:"http://localhost:8000/editprofile",
        data:$('#editprofile').serialize(),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success : function(data){
          console.log('suuuuuuuuuuuuuv');
          console.log(data);
          window.location.reload();
        },
      });
    });
    $('#u-p-f')
    $('#u-c-f')
   $('#pr-image').change(function(e){
     $.ajax({
       type:"post",
       url:"http://localhost:8000/changeprofileimage",
       data:new FormData($('#u-p-f')[0]),
       processData: false,
       contentType: false,
       headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
       success : function(data){
         pr1=document.getElementById('profile1');
         pr2=document.getElementById('profile2');
         pr1.src='../image/'+data+'';
         pr2.src='../image/'+data+'';
         console.log(data);
       },
     });
   });
   $('#cr-image').change(function(e){
     $.ajax({
       type:"post",
       url:"http://localhost:8000/changecoverimage",
       data:new FormData($('#u-c-f')[0]),
       processData: false,
       contentType: false,
       headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
       success : function(data){
         e=document.getElementById('cover');
         e.src='../image/'+data+'';
         console.log(data);
       },
     });
   });
</script>
@endsection
