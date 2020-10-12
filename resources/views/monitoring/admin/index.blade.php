@extends('layouts.monitoring.admin.app')
@section('header_styles')
         <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/c3/css/c3.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/switchery/css/switchery.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/new_dashboard.css')}}"/>
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
             <div class="row ">
                        <div class="col-12 col-sm-6 col-xl-3">
                            <div class="bg-primary top_cards">
                                <div class="row icon_margin_left">

                                    <div class="col-lg-5 col-5 icon_padd_left">
                                        <div class="float-left">
                                            <span class="fa-stack fa-sm">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-users fa-stack-1x fa-inverse text-primary sales_hover"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-7 icon_padd_right">
                                        <div class="float-right cards_content">
                                            <span class="number_val">{{$cu}} </span>
                                            <div>
                                                <br/>
                                            </div>
                                            <span class="card_description">USER</span>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-xl-3">
                            <div class="bg-success top_cards">
                                <div class="row icon_margin_left">
                                    <div class="col-lg-5  col-5 icon_padd_left">
                                        <div class="float-left">
                                            <span class="fa-stack fa-sm">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-building fa-stack-1x fa-inverse text-success visit_icon"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-7 icon_padd_right">
                                        <div class="float-right cards_content">
                                            <span class="number_val">{{$cp}} </span>
                                            <div>
                                                <br/>
                                            </div>
                                            <span class="card_description">COMPANY</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-xl-3">
                            <div class="bg-warning top_cards">
                                <div class="row icon_margin_left">
                                    <div class="col-lg-5 col-5 icon_padd_left">
                                        <div class="float-left">
                                            <span class="fa-stack fa-sm">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-location-arrow fa-stack-1x fa-inverse text-warning revenue_icon"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-7 icon_padd_right">
                                        <div class="float-right cards_content">
                                            <span class="number_val">{{$cloc}} </span>
                                            <div>
                                                <br/>
                                            </div>
                                            <span class="card_description">LOCATION</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-xl-3">
                            <div class="bg-mint top_cards">
                                <div class="row icon_margin_left">
                                    <div class="col-lg-5 col-5 icon_padd_left">
                                        <div class="float-left">
                                            <span class="fa-stack fa-sm">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-inbox  fa-stack-1x fa-inverse text-mint sub"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-7 icon_padd_right">
                                        <div class="float-right cards_content">
                                            <span class="number_val">{{$cm}} </span>
                                            <div>
                                                <br/>
                                            </div>
                                            <span class="card_description">UNREAD MAIL</span>
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
   <script type="text/javascript" src="{{asset('assets/vendors/slimscroll/js/jquery.slimscroll.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/raphael/js/raphael.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/d3/js/d3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/c3/js/c3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/switchery/js/switchery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/flotchart/js/jquery.flot.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/flotchart/js/jquery.flot.resize.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/flotchart/js/jquery.flot.stack.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/flotchart/js/jquery.flot.time.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/flotspline/js/jquery.flot.spline.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/flotchart/js/jquery.flot.categories.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/flotchart/js/jquery.flot.pie.js')}}"></script>
    <script type="text/javascript"
            src="{{asset('assets/vendors/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/jquery_newsTicker/js/newsTicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/countUp.js/js/countUp.min.js')}}"></script>
    <!--end of plugin scripts-->
    <script type="text/javascript" src="{{asset('assets/js/pages/new_dashboard.js')}}"></script>

@stop