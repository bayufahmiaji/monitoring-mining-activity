@extends('layouts.monitoring.user.app')
@section('title')
        @foreach($company as $company) 
    {{$company->nama}}
@endsection
@section('nav')
    <h4>
        <img src="{{ url('/assets/uploads/logo/'.$company -> photo) }}" class="admin_img" style="width: 35px;" alt="logo"> 
        {{$company->nama}}</h4>
        @endforeach
@stop
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
    <link rel="stylesheet" type="text/css" href="{{asset('assets/leaflet/leaflet.css')}}">
    <script type="text/javascript" src="{{asset('assets/leaflet/leaflet.js')}}"></script>
    <!-- Load Esri Leaflet from CDN -->
  <script src="https://unpkg.com/esri-leaflet@2.4.1/dist/esri-leaflet.js"
    integrity="sha512-xY2smLIHKirD03vHKDJ2u4pqeHA7OQZZ27EjtqmuhDguxiUvdsOuXMwkg16PQrm9cgTmXtoxA6kwr8KBy3cdcw=="
    crossorigin=""></script>

  <!-- Load Esri Leaflet Geocoder from CDN -->
  <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.css"
    integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
    crossorigin="">
  <script src="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.js"
    integrity="sha512-HrFUyCEtIpxZloTgEKKMq4RFYhxjJkCiF5sDxuAokklOeZ68U2NPfh4MFtyIVWlsKtVbK5GD2/JzFyAfvT5ejA=="
    crossorigin=""></script>
    <style type="text/css">
     #mapid {
      margin: 0 auto 0 auto;
      height: 70%;
      width: 90%;
     }
     html, body {
            height: 100%;
          }
    </style>
@section('content')
<div class="outer">
        <div class="inner bg-container">

            <!--top section widgets-->
            <div class="row widget_countup">

                <div class="col-12 col-sm-6 col-xl-3">
                <div id="top_widget2">
                        <div class="front">
                            <div class="bg-primary p-d-15 b_r_5">
                                <div class="float-right m-t-5">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="user_font">Tenaga Kerja</div>
                                <div id="widget_countup12">{{$worker}}</div>
                                
                            </div>
                        </div>
                        <div class="back">
                            <div class="bg-white b_r_5 section_border">
                                <div class="p-t-l-r-15">
                                    <div class="float-right m-t-5">
                                        <i class="fa fa-users text-primary"></i>
                                    </div>
                                    <div id="widget_countup12">{{$worker}}</div>
                                    <div>Tenaga Kerja</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3">
                    <div id="top_widget1">
                        <div class="front">
                            <div class="bg-primary p-d-15 b_r_5">
                                <div class="float-right m-t-5">
                                    <i class="fa fa-car"></i>
                                </div>
                                <div class="user_font">Alat Tambang</div>
                                <div id="widget_countup12">{{$equipment}}</div>
                                
                            </div>
                        </div>
                        <div class="back">
                            <div class="bg-white b_r_5 section_border">
                                <div class="p-t-l-r-15">
                                    <div class="float-right m-t-5">
                                        <i class="fa fa-car text-primary"></i>
                                    </div>
                                    <div id="widget_countup12">{{$equipment}}</div>
                                    <div>Alat Tambang</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-sm-6 col-xl-3" >
                    <div id="top_widget3">
                        <div class="front bg-container">
                            <div class="bg-warning p-d-15 b_r_5">
                                <div class="float-right m-t-5">
                                    <i class="fa fa-book"></i>
                                </div>
                                <div class="user_font">Kecelakaan Kerja</div>
                                <div id="widget_countup12">{{$accident}}</div>
                                
                            </div>
                        </div>

                        <div class="back">
                            <div class="bg-white b_r_5 section_border">
                                <div class="p-t-l-r-15">
                                    <div class="float-right m-t-5 text-success">
                                        <i class="fa fa-book"></i>
                                    </div>
                                    <div id="widget_countup22">{{$accident}}</div>
                                    <div>Kecelakaan Kerja</div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3" >
                    <div id="top_widget4">
                        <div class="front bg-container">
                            <div class="bg-success p-d-15 b_r_5">
                                <div class="float-right m-t-5">
                                    <i class="fa fa-location-arrow"></i>
                                </div>
                                <div class="user_font">Lokasi Tambang</div>
                                <div id="widget_countup12">{{$locations}}</div>
                            </div>
                        </div>

                        <div class="back">
                            <div class="bg-white b_r_5 section_border">
                                <div class="p-t-l-r-15">
                                    <div class="float-right m-t-5 text-success">
                                        <i class="fa fa-location-arrow"></i>
                                    </div>
                                    <div id="widget_countup22"><h4>{{$locations}}</h4></div>
                                    <div>Lokasi Tambang</div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
    </div> 
    </div> 
   <br>
     <div class="card">
      <h5 class="card-header container" style="text-align: center;"><strong>Sebaran Tambang</strong></h5>
    </div>
    <br>    
    <div id="mapid" ></div>
            <script type="text/javascript">
                var mapOptions = {
                    center: [ -0.789275,113.921327],
                    zoom: 5.1
                 }

                var map = new L.map('mapid', mapOptions);

                    var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
                    map.addLayer(layer);

                    var array = @json($location);
                    console.log(array)
                    for (var i=0; i<array.length; i++) {
               
                        var lon = array[i]['longitude'];
                        var lat = array[i]['latitude'];
                        var popupText = array[i]['nama'];
                        var popupText2 = array[i]['company'];
                        
                         var markerLocation = new L.LatLng(lat, lon);
                         var marker = new L.Marker(markerLocation);
                         map.addLayer(marker);
                     
                         marker.bindPopup('<b>'+popupText2+'<b><br>'+popupText);
                     
                     }
               

             </script>
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