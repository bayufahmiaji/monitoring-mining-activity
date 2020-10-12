@extends('layouts.monitoring.user.app')
@section('nav')
@foreach($company as $company)
    <h4>
        <img src="{{ url('/assets/uploads/logo/'.$company -> photo) }}" class="admin_img" style="width: 35px;" alt="logo"> 
        {{$company->nama}}</h4>
        @endforeach
@stop
@section('header_styles')
   <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" media="screen" href="{{asset('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/summernote/css/summernote.css')}}"/>
    <!-- end of global styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/form_elements.css')}}"/>
    <!--End of page level styles-->
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
      height: 40%;
      width: 70%;
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
                       Lokasi Lokasi
                    </h4>
                </div>
                
            </div>
        </div>
    </header>
    <div id="mapid" ></div>
    <div class="outer">
        <div class="inner bg-container">
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    {{ $error }} <br/>
                    @endforeach
                </div>
                @endif
              <form method="POST" action="/lokasi/{{$location->id}}/update" enctype="multipart/form-data" name="peta">
                    {{csrf_field()}}
                    <input type="hidden" name="id_company" value="{{auth()->user()->id_company}}">
                    <input type="hidden" name="company" value="{{auth()->user()->name}}">
                    <div class="form-group">
                        <label for="email" class="col-form-label"> Nama Lokasi </label>
                        <div class="input-group input-group-prepend">
                            <input type="text" class="form-control  form-control-md" required name="nama" placeholder="Title" value="{{$location->nama}}">
                        </div>
                    </div> <div class="form-group">
                        <label for="email" class="col-form-label"> Lokasi </label>
                        <div class="input-group input-group-prepend">
                            <input type="text" class="form-control  form-control-md" required name="lokasi" placeholder="Title"value="{{$location->lokasi}}" >
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="email" class="col-form-label"> Longitude</label>
                        <div class="input-group input-group-prepend">
                            <input type="text" class="form-control  form-control-md" required name="longitude" placeholder="Post By"  value="{{$location->lingitude}}">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="email" class="col-form-label"> Latitude</label>
                        <div class="input-group input-group-prepend">
                            <input type="text" class="form-control  form-control-md" required name="latitude" placeholder="Post By" value="{{$location->latitude}}" >
                        </div>
                    </div>
                     <div class="form-group">
                            <input type="submit" value="Submit" class="btn btn-primary"/>
                            <button type="reset" class="btn btn-danger">Reset</button>
                    </div>

              </form>
        </div>       
    </div>
     
            <script type="text/javascript">
                var mapOptions = {
                    center: [ -0.789275,113.921327],
                    zoom: 5.1
                 }

                var map = new L.map('mapid', mapOptions);
                var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
                map.addLayer(layer);

                var geocodeService = L.esri.Geocoding.geocodeService();


                map.on('click', function (e) {
                    var myform = document.peta;
                    geocodeService.reverse().latlng(e.latlng).run(function (error, result) {
                    if (error) {
                      return;
                    }

                    myform.lokasi.value = result.address.Match_addr;
                  });
                  
                  	 myform.longitude.value = e.latlng.lng;
                     myform.latitude.value = e.latlng.lat;
                });
               
             </script>
    @stop
@section('footer_scripts')
   <!--plugin scripts-->
   <script type="text/javascript" src="{{asset('assets/vendors/fileinput/js/fileinput.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/fileinput/js/theme.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/blueimp_file_upload/js/jquery.ui.widget.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/blueimp-tmpl/js/tmpl.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/blueimploadimage/js/load-image.all.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/blueimp-canvas-to-blob/js/canvas-to-blob.min.js')}}"></script>
@stop