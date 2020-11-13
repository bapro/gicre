<style>

.location th{text-align:right}
.location td{text-align:left}
.location tr th{background:#5957F7;color:white}
.location tr td{color:#5957F7}
.modal-title{color:#5957F7}
</style>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i>

</button>
<?php
  ?>
<h2 class="modal-title">Ubicación de <?=$name?> </h2>

</div>
<div class="modal-body" >
<?php
	$ip=$machine['ip'];
$url = json_decode(file_get_contents("http://api.ipinfodb.com/v3/ip-city/?key=e0447a1efdf35aceeb2e32be567e82bc5286078a785d2dd2e34711b3d0724007&ip=".$ip."&format=json"));
 
//print the array to see the fields if you wish.
//print_r($url);
 
echo "<table class='location table table-striped'><tr><th>PAIS:</th><td>";
echo $url->countryName;
echo "</td></tr><tr><th>CIUDAD:</th><td>";
echo $url->cityName;
echo "</td></tr><tr><th>REGION:</th><td>";
echo $url->regionName;
echo "</td></tr><tr><th>IP ADDRESS:</th><td>";
echo $url->ipAddress;
echo "</td></tr><tr><th>CODIGO DEL PAIS:</th><td>";
echo $url->countryCode;
//echo "</td></tr><tr><th>LATITUTE:</th><td>";
//echo $url->latitude;
//echo "</td></tr><tr><th>LONGITUDE:</th><td>";
////echo $url->longitude;
//echo "</td></tr><tr><th>TIMEZONE:</th><td>";
//echo $url->timeZone;
echo "</td></tr><tr></table>";
 
?>
<hr/>	
	<p>
<strong><i>
sistema operativo :<?=$machine['OpeSys']?><br/>
Navegador :<?=$machine['Browser']?> / Version : <?=$machine['browser_v']?>
</i></strong>
</p>

<div id="mapid" style="width: auto; height: 400px;"></div>
</div>

<script>
var mymap = L.map('mapid').setView([51.505, -0.09], 13);

	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		/*attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',*/
		id: 'mapbox.streets'
	}).addTo(mymap);

	L.marker([<?=$url->latitude?>, <?=$url->longitude?>]).addTo(mymap)
		.bindPopup("AQUI ESTA EL USUARIO.").openPopup();

	L.circle([51.508, -0.11], 500, {
		color: 'red',
		fillColor: '#f03',
		fillOpacity: 0.5
	}).addTo(mymap).bindPopup("I am a circle.");

	L.polygon([
		[51.509, -0.08],
		[51.503, -0.06],
		[51.51, -0.047]
	]).addTo(mymap).bindPopup("I am a polygon.");


	var popup = L.popup();

</script>


