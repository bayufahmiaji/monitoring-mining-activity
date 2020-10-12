<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <title>
        @section('title')
        {{auth()->user()->name}}
        @show
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('assets/img/esdm.png')}}"/>
    <!-- global styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/components.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/custom.css')}}"/>
    <link type="text/css" rel="stylesheet" href="#" id="skin_change"/>
    <!-- end of global styles-->
    @yield('header_styles')
</head>

<body class="sidebar-left-hidden" 
@section('bg-color')
style="background-color: white;"
@show>
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
        <img src="{{asset('assets/img/loader.gif')}}" style=" width: 40px;" alt="loading...">
    </div>
</div>
<div id="wrap">
    <div id="top">
        <!-- .navbar -->
        <nav class="navbar navbar-static-top">
            <div class="container-fluid m-0">
                <a class="navbar-brand" href="/index">
                    @section('nav')
                    <h4><img src="{{ url('/assets/uploads/logo/'.auth()->user()->photo)}}" class="admin_img" style="width: 35px;" alt="logo">   {{auth()->user()->name}}</h4>
                    @show
                </a>
                </a>
                <div class="menu mr-sm-auto">
                    <span class="toggle-left" id="menu-toggle">
                        <i class="fa fa-bars"></i>
                    </span>
                </div>
                <div class="topnav dropdown-menu-right">
                    <div class="btn-group small_device_search" data-toggle="modal"
                         data-target="#search_modal">
                        <i class="fa fa-search text-primary"></i>
                    </div>
                    </div>
                    <div class="btn-group">
                        <div class="user-settings no-bg">
                            <button type="button" class="btn btn-default no-bg micheal_btn" data-toggle="dropdown">
                                <img src="{{asset('assets/img/admin.jpg')}}" class="admin_img2 img-thumbnail rounded-circle avatar-img"
                                     alt="avatar"> <strong>
                                     
                                    {{auth()->user()->name}}
    
                                        </strong>
                                <span class="fa fa-sort-down white_bg"></span>
                            </button>
                            <div class="dropdown-menu admire_admin">
                                <a class="dropdown-item" href="/edit_user"><i class="fa fa-cogs"></i>
                                    Account Settings</a>
                                <a class="dropdown-item" href="/logout"><i class="fa fa-sign-out"></i>
                                    Log Out</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- /.navbar -->
        <!-- /.head -->
    </div>
    <!-- /#top -->
    <div class="wrapper">
        <div id="left">
            <div class="menu_scroll mt-3">
                <ul id="menu">
                       <li {!! (Request::is('/')? 'class="active"':"") !!}>
                        <a href="{{ URL('/') }} ">
                            <i class="fa fa-home"></i>
                            <span class="link-title menu_hide">&nbsp;&nbsp;Home</span>
                        </a>
                        </li>
                         <li {!! (Request::is('lokasi')? 'class="active"':"") !!}>
                            <a href="{{URL::to('lokasi')}} ">
                                <i class="fa fa-location-arrow"></i>
                             <span class="link-title menu_hide">&nbsp;&nbsp;Lokasi Tambang</span>
                            </a>
                        </li>   
                        <li {!! (Request::is('alat')? 'class="active"':"") !!}>
                        <a href="{{ URL('/alat') }} ">
                            <i class="fa fa-archive"></i>
                            <span class="link-title menu_hide">&nbsp;&nbsp;Alat Tambang</span>
                        </a>
                        </li>
                         <li class="dropdown_menu Request::is('penjualan')? 'active':'' )!!}">
                            <a href="javascript:;">
                                <i class="fa fa-th-large"></i>
                                <span class="link-title menu_hide">&nbsp; Kelola Project Tambang</span>
                                <span class="fa arrow menu_hide"></span>
                            </a>
                            <ul class="sub-menu">
                                 <li {!! (Request::is('pegawai')? 'class="active"':"") !!}>
                                <a href="{{ URL('/pegawai') }} ">
                                    <i class="fa fa-angle-right"></i>
                                   &nbsp;Tenaga Kerja
                                </a>
                                </li>
                                <li {!! (Request::is('Hasil')? 'class=""':"") !!}>
                                <a href="{{URL::to('')}} ">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Produksi Tambang
                                </a>
                                    <ul class="sub-menu sub-submenu">
                                        <li {!! (Request::is('pengupasan')? 'class="active"':"") !!}>
                                            <a href="{{URL::to('pengupasan')}} ">
                                            <i class="fa fa-angle-right"></i>
                                            &nbsp; Pengupasan
                                            </a>
                                        </li>
                                        <li {!! (Request::is('penggalian')? 'class="active"':"") !!}>
                                            <a href="{{URL::to('penggalian')}} ">
                                            <i class="fa fa-angle-right"></i>
                                            &nbsp; Penggalian
                                            </a>
                                        </li>
                                        <li {!! (Request::is('penangkutan')? 'class="active"':"") !!}>
                                            <a href="{{URL::to('pengangkutan')}} ">
                                            <i class="fa fa-angle-right"></i>
                                            &nbsp; Pengangkutan
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li {!! (Request::is('biayas')? 'class="active"':"") !!}>
                                <a href="{{URL::to('biayas')}} ">
                                    <i class="fa fa-angle-right"></i>
                                    <span class="link-title">&nbsp; Biaya Produksi </span>
                                </a>
                                </li>
                                <li {!! (Request::is('kecelakaan')? 'class="active"':"") !!}>
                                <a href="{{URL::to('kecelakaan')}} ">
                                    <i class="fa fa-angle-right"></i>
                                    <span class="link-title">&nbsp; Kecelakaan Kerja </span>
                                </a>
                                </li>
                            </ul>
                            </li>

                         <li {!! (Request::is('mail_inbox')? 'class="active"':"") !!}>
                        <a href="{{ URL('/mail_inbox') }} ">
                            <i class="fa fa-inbox"></i>
                            <span class="link-title menu_hide">&nbsp;&nbsp;Mail</span>
                        </a>
                        </li>
                        </ul>
                        </li>
                        </ul>
                    </li>
                </ul>
                <!-- /#menu -->
            </div>
        </div>
        <!-- /#left -->

        <div id="content" class="bg-container">
            <!-- Content -->
            @yield('content')
            <!-- Content end -->
        </div>
        <div class="modal fade" id="search_modal" tabindex="-1" role="dialog"
             aria-hidden="true">
            <form>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="float-right" aria-hidden="true">&times;</span>
                        </button>
                        <div class="input-group search_bar_small">
                            <input type="text" class="form-control" placeholder="Search..." name="search">
                            <span class="input-group-append">
        <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>
      </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /#content -->
    @include('layouts/right_sidebar/default')

</div>
<!-- /#wrap -->
<!-- global scripts-->
<script type="text/javascript" src="{{asset('assets/js/components.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>
<!-- end of global scripts-->
<!-- page level js -->
@yield('footer_scripts')
<!-- end page level js -->
</body>
</html>