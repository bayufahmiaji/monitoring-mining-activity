@extends('layouts.monitoring.admin.app')
@section('header_styles')
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/chartist/css/chartist.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/circliful/css/jquery.circliful.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/index.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/fullcalendar/css/fullcalendar.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/calendar_custom.css')}}"/>
     <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/swiper/css/swiper.min.css')}}"/>
    <!-- end of page level styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/widgets.css')}}">
@stop
@section('content')
<div class="outer">
    <div>
        <center>
            
        <table>
            <tr>
                <td><img width="150px" height="150px" src="{{ url('/assets/uploads/logo/'.$company -> photo) }}"></td>
                <td><strong><h2>{{$company->nama}}</h2></strong></td>
            </tr>
        </table>
        </center>
    </div>
</div>
<div class="outer">
        <div class="inner bg-container">

            <!--top section widgets-->
            <div class="row widget_countup">

                <div class="col-12 col-sm-6 col-xl-3">
                <div id="top_widget2">
                        <div >
                            <div class="bg-primary p-d-15 b_r_5">
                                <div class="float-right m-t-5">
                                    <a href="/company/{{$company->id}}/pegawai" style="color: white">
                                        <i class="fa fa-users"></i>
                                    </a>
                                </div>
                                <div class="user_font"><a href="/pegawai" style="color: white">Tenaga Kerja</a></div>
                                <div id="widget_countup12">{{$worker}}</div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3">
                    <div id="top_widget1">
                        <div >
                            <div class="bg-primary p-d-15 b_r_5">
                                <div class="float-right m-t-5">
                                    <a href="/company/{{$company->id}}/alat" style="color: white">
                                        <i class="fa fa-anchor"></i>
                                    </a>
                                </div>
                                <div class="user_font"><a href="/company/{{$company->id}}/alat" style="color: white">Alat Tambang</a></div>
                                <div id="widget_countup12">{{$equipment}}</div>
                                
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-sm-6 col-xl-3 media_max_1199" >
                    <div id="top_widget3">
                        <div>
                            <div class="bg-primary p-d-15 b_r_5">
                                <div class="float-right m-t-5">
                                    <a href="/company/{{$company->id}}/kecelakaan" style="color: white">
                                        <i class="fa fa-warning"></i>
                                    </a>
                                </div>
                                <div class="user_font"><a href="/kecelakaan" style="color: white">Kecelakaan Kerja</a></div>
                                <div id="widget_countup12">{{$accident}}</div>
                                
                            </div>
                        </div>
                    </div>
                </div>

               <div class="col-12 col-sm-6 col-xl-3 media_max_1199" >
                    <div id="top_widget3">
                        <div>
                            <div class="bg-primary p-d-15 b_r_5">
                                <div class="float-right m-t-5">
                                    <a href="/company/{{$company->id}}/lokasi" style="color: white">
                                        <i class="fa fa-location-arrow"></i>
                                    </a>
                                </div>
                                <div class="user_font"><a href="/company/{{$company->id}}/lokasi" style="color: white">Lokasi Tambang</a></div>
                                <div id="widget_countup12">{{$location}}</div>
                                
                            </div>
                        </div>
                    </div>
                </div>

               
            </div>
    </div> 
</div>
    <div class="outer">
        <div class="inner bg-container">
            <div class="row widget_countup">
                        <div class="col-12 col-sm-6 col-xl-3">
                        <div id="top_widget2">
                                <div >
                                    <div class="p-d-15 b_r_5">
                                        <div class="float-right m-t-5">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                        <div class="col-12 col-sm-6 col-xl-3">
                        <div id="top_widget2">
                                <div >
                                    <div class="bg-primary p-d-15 b_r_5">
                                        <div class="float-right m-t-5">
                                           <a href="/company/{{$company->id}}/produksi" style="color: white">
                                        <i class="fa fa-book"></i>
                                    </a>
                                        </div><br>
                                        <div class="user_font"><a href="/produksi" style="color: white">Produksi Tambang</a></div>
                                        <br>
                                        <div id="widget_countup12"><a href="/produksi" style="color: white"></a></div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                       
                        <div class="col-12 col-sm-6 col-xl-3">
                            <div id="top_widget1">
                                <div >
                                    <div class="bg-primary p-d-15 b_r_5">
                                        <div class="float-right m-t-5">
                                            <a href="/company/{{$company->id}}/biaya" style="color: white">
                                        <i class="fa fa-money"></i>
                                    </a>
                                        </div><br>
                                        <div class="user_font"><a href="/company/{{$company->id}}/biaya" style="color: white">Biaya Produksi</a></div>
                                        <br>
                                        <div id="widget_countup12"><a href="/company/{{$company->id}}/biaya" style="color: white"></a></div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div> 
        </div>
@stop
@section('footer_scripts')
    <!--  plugin scripts -->
    <script type="text/javascript" src="{{asset('assets/vendors/moment/js/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/fullcalendar/js/fullcalendar.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pluginjs/calendarcustom.js')}}" ></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/calendar.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/countUp.js/js/countUp.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/flip/js/jquery.flip.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pluginjs/jquery.sparkline.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/chartist/js/chartist.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pluginjs/chartist-tooltip.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/swiper/js/swiper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/circliful/js/jquery.circliful.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/flotchart/js/jquery.flot.js')}}" ></script>
    <script type="text/javascript" src="{{asset('assets/vendors/flotchart/js/jquery.flot.resize.js')}}"></script>
     <script type="text/javascript" src="{{asset('assets/js/pages/index.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/moment/js/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/slimscroll/js/jquery.slimscroll.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/countUp.js/js/countUp.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/swiper/js/swiper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/widget2.js')}}"></script>
    <!--end of plugin scripts-->

    <script type="text/javascript" src="{{asset('assets/js/pages/index.js')}}"></script>

@stop