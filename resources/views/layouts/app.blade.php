<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="../image/80.jpg"  />
    <title>Relation</title>
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login-r.css">
    <link rel="stylesheet" href="css/Normalize.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
    <div class="form wow bounceInDown">
        @yield('content')
    </div>
    <!-- Scripts -->
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/js.js"></script>

</body>
</html>
