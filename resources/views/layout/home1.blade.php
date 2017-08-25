<html>
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="../image/80.jpg"  />
        <title>Relation</title>
        <link rel="stylesheet" href="../css/animate.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/Normalize.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
    </head>
    <body>
      <nav class="navbar navbar-default navbar-static-top navbar-fixed-top">
          <div class="container">
              <div class="navbar-header">
                  <!-- Collapsed Hamburger -->
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                      <span class="sr-only">Toggle Navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                  <!-- Branding Image -->
                  <a class="navbar-brand" href="">Relation</a>
              </div>
              <div class="collapse navbar-collapse" id="app-navbar-collapse">
                  <!-- Left Side Of Navbar -->
                  <ul class="nav navbar-nav">
                    <form class="top-search">
                      <li><a href="#"><input type="search" placeholder="Search for people, files & reports" name="" value="" ></a></li>
                      <li><i class="fa fa-search search"></i></li>
                   </form>
                  </ul>
                  <!-- Right Side Of Navbar -->
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href=""><i class="fa fa-user"></i></a></li>
                    <li><a href="../profile/{{$user->id}}">{{$user->name}}</a></li>
                    <li><a href="/">Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-user-plus"><span class="number"><?php $coun=0 ?>  @foreach ($add as $coo)
                               <?php $coun=$coun+1?> 
                              @endforeach <?php echo $coun; ?></span></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                          @foreach ($add as $coo)
                            <li>
                              <div class="row" style="width:103%;">
                              <div class="col-md-2">
                                <a class="avatar-img" href="{{$coo}}" id=""><img src="../image/{{$coo->image}}" alt=""></a>
                              </div>
                              <div class="col-md-4">
                                <a href=""><h2>{{$coo->name}}</h2></a>
                              </div>
                              <div class="col-md-3">
                                <button type="button" id="addff{{$coo->id}}" name="button" onclick="addff({{$coo->id}})" class="btn btn-default">Accept</button>
                              </div>
                              <div class="col-md-3">
                                <button type="button" id="deletf{{$coo->id}}" name="button" onclick="deletf({{$coo->id}})" class="btn btn-default">ignore</button>
                             </div>
                           </div>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-comments-o"><span class="number">0</span></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                          <li>
                            <a href="#">first</a>
                          </li>
                          <li>
                            <a href="#">first</a>
                          </li>
                          <li>
                            <a href="#">first</a>
                          </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-globe"><span class="number">0</span></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                          <li>
                            <a href="#">first</a>
                          </li>
                          <li>
                            <a href="#">first</a>
                          </li>
                          <li>
                            <a href="#">first</a>
                          </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                          <li>
                            <a href="../mygroup">MyGroup</a>
                          </li>
                          <li>
                            <a href="#">first</a>
                          </li>
                          <li>
                              <a href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                  Logout
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                          </li>
                        </ul>
                    </li>
                  </ul>
              </div>
          </div>
      </nav>
      <div class="page">
        <div class="col-md-2 hidden-xs hidden-sm">
          <div class="stack">
            <div class="ay7aga">
              <div class="profile">
                <div class="profile_image">
                  <div class="background_image" style="background-image:url('../image/{{$user->image}}');
                    background-position: center;
                    background-size: cover;
                    display: block;
                    height: 54px;">
                  </div>
                  <div class="self_image">
                    <img src="../image/{{$user->image}}" alt="">
                    <h2>{{$user->name}}</h2>
                    <p>{{$user->birhtdata}} years</p>
                  </div>
                </div>
                <div class="group">
                  <a href="../managegro/{{$user->id}}"><p><?php echo count($user->groups) ?></p></a>
                  <h2>Group that you are join</h2>
                  <a href="../crgroup/"><p>create group</p></a>
                </div>
                <div class="connection">
                  <p>300</p>
                  <h2>connection</h2>
                  <h3>Grow your network</h3>
                  <a href="../allgro">Show All Group</a>
                </div>
              </div>
            </div>
          </div>
        </div>
          @yield('content')
      </div>
      <script src="../js/jquery-3.1.0.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
      <script src="../js/jquery.min.js"></script>
      <script src="../js/wow.min.js"></script>
      <script src="../js/jquery.nicescroll.min.js"></script>
      <script src="../js/js.js"></script>
    </body>
</html>
