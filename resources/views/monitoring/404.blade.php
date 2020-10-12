<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>403 | Access Denied</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="{{asset('assets/img/esdm.ico')}}"/>
    <!-- global level css-->
    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <!-- end of globallevel js-->
    <!-- page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/404.css')}}" />
    <link type="text/css" rel="stylesheet" href="#" id="skin_change"/>
    <!-- end of page level styles-->
</head>
<body>
<div class="preloader" style=" position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 100000;
  backface-visibility: hidden;
  background: #ffffff;">
    <div class="preloader_img" style="width: 200px;
  height: 200px;
  position: absolute;
  left: 48%;
  top: 48%;
  background-position: center;
z-index: 999999">
        <img src="{{asset('assets/img/esdm.png')}}" style=" width: 40px;" alt="loading...">
    </div>
</div>
<div id="animate">
    <div class="text-white number text-center">
        Go back to
        <a href="/" class="text-primary">HOME</a>
    </div>
    <div class="text-center">
        <img src="{{asset('assets/img/esdm.png')}}" class="img-fluid center-block" alt="Page Not Found" height="500" width="500" />
    </div>
</div>
<!-- global js -->
<!--jQuery 2.1.1 -->
<script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
<!--Bootstrap -->
<script type="text/javascript" src="{{asset('assets/js/popper.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/pages/404.js')}}"></script>
<!-- end of global js -->
</body>

</html>