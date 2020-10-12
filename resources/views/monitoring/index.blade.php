@extends('layouts.monitoring.app')
@section('title')
	Puslitbang tekMIRA
@stop
{{-- page level styles --}}
@section('header_styles')
	<link rel="stylesheet" type="text/css" href="{{asset('assets/leaflet/leaflet.css')}}">
	<script type="text/javascript" src="{{asset('assets/leaflet/leaflet.js')}}"></script>
	<style type="text/css">
	 #mapid {
	  margin: 0 auto 0 auto;
	  height: 90%;
	  width: 80%;
	 }
	 html, body {
	        height: 100%;
	      }
	</style>
@section('content')
<div class="card">
  <h5 class="card-header" style="text-align: center;"><strong><h2>Sebaran Tambang Indonesia</h2></strong></h5>
</div>
	<div id="mapid" ></div>
@stop
@section('footer_scripts')
			<script type="text/javascript">
			  	var mapOptions = {
			     	center: [ -0.789275,113.921327],
			     	zoom: 5
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