<html>
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="../image/80.jpg"  />
        <title>Relation</title>
        <link rel="stylesheet" href="../css/animate.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/face.css">
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
                    <!-- <li>
                     <nav class="navbar navbar-light bg-light">
                      <a class="navbar-brand" href="#">
                        <img src="../image/{{$user->image}}" width="30" height="30" class="d-inline-block align-top" alt="">
                        Bootstrap
                      </a>
                    </nav>
                    </li> -->
                    <li><a href="../profile/{{$user->id}}"><img src="../image/{{$user->image}}" style="width:20px;height:20px"></i></a></li>
                    <li><a href="../profile/{{$user->id}}">{{$user->name}}</a></li>
                    <li><a href="/">Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-user-plus"><span class="number"><?php $coun=0 ?>  @foreach ($freind_request as $coo)
                               <?php $coun=$coun+1?>
                              @endforeach <?php echo $coun; ?></span></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                          @foreach ($freind_request as $coo)
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
                            <i class="fa fa-comments-o"><span class="number"><?php $num1=count($freind1);  $num2=count($freind2); $numcon=$num1+$num2 ?>{{$numcon}}</span></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                          @foreach ($freind1 as $fre1)
                          <li>
                            <a href="chat/{{$fre1->id}}">{{$fre1->name}}</a>
                          </li>
                          @endforeach
                          @foreach ($freind2 as $fre2)
                          <li>
                            <a href="chat/{{$fre2->id}}">{{$fre2->name}}</a>
                          </li>
                          @endforeach
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
                            <a href="../setting">setting</a>
                          </li>
                          <li>
                            <a href="../crgroup">crete_group</a>
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
      <div class="container page-content ">
        <div class="row">
          @yield('content')
        </div>
      </div>
      <script src="../js/jquery-3.1.0.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
      <script src="../js/jquery.min.js"></script>
      <script src="../js/wow.min.js"></script>
      <script src="../js/jquery.nicescroll.min.js"></script>
      <script src="../js/js.js"></script>
      @yield('scripts')
    </body>
</html>
