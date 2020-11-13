
<!doctype html>
<html>
    <head>
        <meta charset='utf-8'/>
        <title>Google Maps</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvuSegtbVLqW2rB0-JDPUEa6oOjMYxUgA&callback=initMap"></script>

        <script type='text/javascript'>
            (function(){
                 $("#show_map").on('change', function (e) {
               e.preventDefault();
                var map,marker,latlng,bounds,infowin;
                /* initial locations for map */
                var _lat=18.735693;
                var _lng=-718.735693;
                var latitude=<?=?>;
				var longitud=<?=?>;
				var name=<?=?>;
                //var getacara=0; /* What should this be? is it a function, a variable ???*/

                function showMap(){
                    /* set the default initial location */
                    latlng={ lat: _lat, lng: _lng };

                    bounds = new google.maps.LatLngBounds();
                    infowin = new google.maps.InfoWindow();

                    /* invoke the map */
                    map = new google.maps.Map( document.getElementById('map'), {
                       center:latlng,
                       zoom: 0
                    });

                    /* show the initial marker */
                    marker = new google.maps.Marker({
                       position:latlng,
                       map: map,
                      // title: 'Hello World!'
                    });
                   // bounds.extend( marker.position );


                    /* I think you can use the jQuery like this within the showMap function? */
                   
				   $.ajax({
                        /* 
                            I'm using the same page for the db results but you would 
                            change the below to point to your php script ~ namely
                            phpmobile/getlanglong.php
                        */
                        //url: document.location.href,/*'phpmobile/getlanglong.php'*/
						url: '<?php echo site_url('admin/testmap');?>',
                        data: {'ajax':true },
                        dataType: 'json',
                        success: function( data, status ){
                            $.each( data, function( i,item ){
                                /* add a marker for each location in response data */ 
                                addMarker( item.latitude, item.longitude, item.name );
                            });
                        },
                        error: function(){
                            output.text('There was an error loading the data.');
                        }
                    });                 
                }

                /* simple function just to add a new marker */
                function addMarker(lat,lng,title){
                    marker = new google.maps.Marker({/* Cast the returned data as floats using parseFloat() */
                       position:{ lat:parseFloat( lat ), lng:parseFloat( lng ) },
                       map:map,
                       title:title
                    });

                    google.maps.event.addListener( marker, 'click', function(event){
                        infowin.setContent(this.title);
                        infowin.open(map,this);
                        infowin.setPosition(this.position);
                    }.bind( marker ));

                    bounds.extend( marker.position );
                    map.fitBounds( bounds );
					map.setZoom(18);
                }


                //document.addEventListener( 'DOMContentLoaded', showMap, false );
				 google.maps.event.addDomListener(window, 'load', showMap);
				 });
            }());
        </script>
        <style>
       #map{ height:500px;width:500px }
        </style>
    </head>
    <body>
        <div id='map'></div>
    </body>
</html>