
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

	<div id="mapid" ></div>

			<script type="text/javascript">
			  	var mapOptions = {
			     	center: [ -0.789275,113.921327],
			     	zoom: 5.1
			 	 }

			 	var map = new L.map('mapid', mapOptions);

			 	var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
				map.addLayer(layer);

				var marker = L.marker([-6.990325715679011,110.42296171188356]).addTo(map);
				marker.bindPopup('<b>Lapangan "Pancasila" Simpang Lima</b><br>Jl. Simpang Lima, Pleburan, Semarang Sel., 	Kota Semarang, Jawa Tengah 50241.');
			  	map.on('click', function (e) {
				    alert("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng);
				});
			 </script>
