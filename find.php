<?php
    require_once("connect.php");
    require_once("config_home.php");
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <script src="http://maps.google.com/maps/api/js?key=AIzaSyBmH-aZePSfjYwBjBLJtuBfdqCRdawcPQg&libraries=places&region=uk&language=en&sensor=true"></script>
    </head>
    <center>
    <body>
        สถานที่:
        <input id="searchTextField"  type="text" size="100" style="text-align: left;width:400px;direction: ltr;">
        <br>
        <br>
        ละติจูด:<input name="latitude" class="MapLat" value="" type="text" placeholder="Latitude" style="width: 170px;">
        ลองติจูด:<input name="longitude" class="MapLon" value="" type="text" placeholder="Longitude" style="width: 170px;">
        <div id="map_canvas" style="height: 100%;width: 100%;margin: 0.6em;"></div>
        <script>
        $(function () {
        var lat = 16.4321938,
        lng = 102.82362139999998,
        latlng = new google.maps.LatLng(lat, lng),
        image = 'photo/map-marker.png';
        //zoomControl: true,
        //zoomControlOptions: google.maps.ZoomControlStyle.LARGE,
        var mapOptions = {
        center: new google.maps.LatLng(lat, lng),
        zoom: 17,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        panControl: true,
        mapTypeControl: true,
        panControlOptions: {
        position: google.maps.ControlPosition.TOP_RIGHT
        },
        zoomControl: true,
        zoomControlOptions: {
        style: google.maps.ZoomControlStyle.LARGE,
        position: google.maps.ControlPosition.TOP_left
        }
        },
        map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions),
        marker = new google.maps.Marker({
        position: latlng,
        map: map,
        icon: image
        });
        var input = document.getElementById('searchTextField');
        var autocomplete = new google.maps.places.Autocomplete(input, {
        types: ["geocode"]
        });
        autocomplete.bindTo('bounds', map);
        var infowindow = new google.maps.InfoWindow();
        google.maps.event.addListener(autocomplete, 'place_changed', function (event) {
        infowindow.close();
        var place = autocomplete.getPlace();
        if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
        } else {
        map.setCenter(place.geometry.location);
        map.setZoom(17);
        }
        moveMarker(place.name, place.geometry.location);
        $('.MapLat').val(place.geometry.location.lat());
        $('.MapLon').val(place.geometry.location.lng());
        });
        google.maps.event.addListener(map, 'click', function (event) {
        $('.MapLat').val(event.latLng.lat());
        $('.MapLon').val(event.latLng.lng());
        infowindow.close();
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
        "latLng":event.latLng
        }, function (results, status) {
        console.log(results, status);
        if (status == google.maps.GeocoderStatus.OK) {
        console.log(results);
        var lat = results[0].geometry.location.lat(),
        lng = results[0].geometry.location.lng(),
        placeName = results[0].address_components[0].long_name,
        latlng = new google.maps.LatLng(lat, lng);
        moveMarker(placeName, latlng);
        $("#searchTextField").val(results[0].formatted_address);
        }
        });
        });
        
        function moveMarker(placeName, latlng)
        {
        marker.setIcon(image);
        marker.setPosition(latlng);
        infowindow.setContent(placeName);
        }
        });
        </script>
    </body>
    </center>
</html>