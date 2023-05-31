<!DOCTYPE html>
<html>
<head>
	<title>Display Sensor Data on Leaflet Map</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
	<style>
		#mapid {
			height: 100vh;
			width: 100vw;
		}
	</style>
</head>
<body>
	<div id="mapid"></div>
	<script>
		var mymap = L.map('mapid').setView([0,0], 2);
		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			maxZoom: 19,
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
		}).addTo(mymap);

	// Retrieve sensor data from the database table
	// Replace 'SensorData' with your actual model name
	@foreach(App\Models\SensorData::all() as $data)
		var latlng = L.latLng({{$data->latitude}}, {{$data->longitude}});
		L.marker(latlng).addTo(mymap);
	@endforeach
</script>

</body>
</html>