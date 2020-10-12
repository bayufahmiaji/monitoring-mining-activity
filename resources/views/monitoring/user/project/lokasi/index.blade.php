@extends('layouts.monitoring.user.app')
@section('nav')
@foreach($company as $company)
    <h4>
        <img src="{{ url('/assets/uploads/logo/'.$company -> photo) }}" class="admin_img" style="width: 35px;" alt="logo"> 
        {{$company->nama}}</h4>
        @endforeach
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
<header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-sm-6">
                    <h4 class="nav_top_align">
                        <i class="fa fa-home"></i>
                       Lokasi
                    </h4>
                </div>
                
            </div>
        </div>
    </header>
     <div class="outer">
     	<center>
        <a href="/lokasi/add" class="btn btn-primary col-sm-10">
            <span class="btn-label">
                <i class="fa fa-plus"></i>
            </span>
            Tambah Lokasi
        </a>
     	</center>
    </div>
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
		            var id = array[i]['id'];
		             var markerLocation = new L.LatLng(lat, lon);
		             var marker = new L.Marker(markerLocation);
		             map.addLayer(marker);
		         
		             marker.bindPopup('<b>'+popupText2+'<b><br>'+popupText+
                  '<br> <a href="/lokasi/'+id+'/edit" style="color:white;" class="btn btn-primary"><i class="fa fa-edit"></i></a><a href="/lokasi/'+id+'/delete" class="btn btn-danger" style="color:white;"><i class="fa fa-trash"></i></a>');
		         
		         }
              
               
               
             </script>
    @stop
