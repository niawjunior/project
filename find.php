<?php
require_once("connect.php");
require_once("config.php");
session_start();
if($_SESSION["STATUS"]=='')
{
  header('Location: 404.php');
  exit();
}
$POST = $_SESSION["USER"];
?>
<?php
if(isset($_POST['submit']))
{
 $h1 = 'ไม่ระบุชื่อ';
 $h2 = $_POST['searchTextField'];
 $la = $_POST['latitude'];
 $lo = $_POST['longitude'];
 $deep = 'ไม่ระบุ';
  mysqli_query($connect,"INSERT INTO activity (user,time,date,atvt,note) VALUES  ('$POST','$time',' $date','เพิ่มแผนที่',' เพิ่มข้อมูล | สถานที่ ".$h1."') ");

  mysqli_query($connect,"UPDATE member SET lastactivity = 'เพิ่มแผนที่ | สถานที่ $h1'  where user = '$POST'");
  mysqli_query($connect,"UPDATE member SET countatvt = countatvt+1 where user = '$POST'");
  mysqli_query($connect,"INSERT INTO data (h1,h2,la,lo,url,deep) VALUES ('$h1','".$_POST["searchTextField"]."','".$_POST["latitude"]."','".$_POST["longitude"]."','map.jpg','$deep')");
  ?>
    <script>
    window.top.location.replace("profile.php?Action=Multiple");
  </script>
  <?php
}

?>
<html lang="en">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8" />
        <script src="http://maps.google.com/maps/api/js?key=AIzaSyBmH-aZePSfjYwBjBLJtuBfdqCRdawcPQg&libraries=places&region=uk&language=en"></script>
    </head>
    <body>
    <form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    &nbsp;
        สถานที่:
        <input id="searchTextField" name="searchTextField"  type="text" placeholder="ค้นหาสถานที่" style=" width: 380px;box-shadow: inset 0 1px 1px rgba(0,0,0,.075);line-height: 1.42857143;border-radius: 4px;padding: 6px 12px;border: 1px solid #ccc;" required>

        ละติจูด:
        <input name="latitude" class="MapLat" value="" type="text" placeholder="Latitude" style="box-shadow: inset 0 1px 1px rgba(0,0,0,.075);line-height: 1.42857143;border-radius: 4px;padding: 6px 12px;border: 1px solid #ccc;" required>
        ลองติจูด:
        <input name="longitude" class="MapLon" value="" type="text" placeholder="Longitude" style="box-shadow: inset 0 1px 1px rgba(0,0,0,.075);line-height: 1.42857143;border-radius: 4px;padding: 6px 12px;border: 1px solid #ccc;" required>
          <?php if($_SESSION["status"] == 'ADMIN')
    {
        ?>
        <button name="submit" class="btn btn-primary btn-sm" id="submit" value="" type="submit">เพิ่ม <span class="glyphicon glyphicon-plus-sign"></span></button>

        <?php
    }
    ?>
          <a  href="/project_final/profile.php?Action=Multiple" target="_top" class="btn btn-warning btn-sm" role="button"><span class="glyphicon glyphicon-arrow-left"></span> ย้อนกลับ</a>
    </form>
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
</html>
