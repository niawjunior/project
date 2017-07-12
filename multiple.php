<?php
require_once("connect.php");
require_once("config.php");
$connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
$result=mysqli_query($connect,"SELECT * FROM data");
while ($row=mysqli_fetch_array($result))
{
$locations[] = array("info" => $row['h1'],"info1"=>$row['h2'],"lat"=>$row['la'], "long"=>$row['lo'],"url"=>$row['url'],"level" => $row['level'],"time" => $row['time'],"date" => $row['date'],"deep" => $row['deep']);
}
$objQuery3 = mysqli_query($connect,"SELECT * FROM showdata");
while($objResult3 = mysqli_fetch_array($objQuery3))
{
$f111 = $objResult3['showh1'];
}
?>
<html>
    <style>
    .gm-style-iw {
    background-color: rgba(255, 255, 255);
    box-shadow: 0 10px 50px rgba(178, 178, 178, 0.6);
    top: 10px !important;
    color: rgb(0, 0,0) !important;
    text-align: center;
    }
    </style>
    <center>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <style type="text/css">
    body { font: normal 10pt Helvetica, Arial; }
    #map { width: auto; height: 100%; border: 0px; padding: 0px; }
    </style>
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyBmH-aZePSfjYwBjBLJtuBfdqCRdawcPQg"></script>
    <script>
    new google.maps.Size(32, 32), new google.maps.Point(0, 0),
    new google.maps.Point(16, 32);
    var center = null;
    var map = null;
    var currentPopup;
    var bounds = new google.maps.LatLngBounds();
    function addMarker(lat, lng, info,info1,level,deep)
    {
    var iconBase = 'photo/map-marker.png';
    var pt = new google.maps.LatLng(lat, lng);
    bounds.extend(pt);
    var marker = new google.maps.Marker(
    {
    position: pt,
    map: map,
    draggable: false,
    animation: google.maps.Animation.DROP,
    title:"simple tooltip",
    icon: iconBase
    
    });
    
    var popup = new google.maps.InfoWindow(
    {
    content: info,
    maxWidth: 1000
    });
    google.maps.event.addListener(marker, "click", function()
    {
    if (currentPopup != null)
    {
        currentPopup.close();
        currentPopup = null;
    }
    popup.open(map, marker);
    currentPopup = popup;
    });
    google.maps.event.addListener(popup, "closeclick", function()
    {
    map.panTo(center);
    currentPopup = null;
    });
    }
    function initMap()
    {
    map = new google.maps.Map(document.getElementById("map"), {
    center: new google.maps.LatLng(16.4321938, 102.82362139999998),
    zoom: 13,
    mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    <?php
    foreach($locations AS $loc)
    {
    ?>
    addMarker(
    <?php
    if($loc["info"] == $f111)
    {
        $check1 =  "กำลังใช้งาน";
        $L="success";
    if (($loc['level']*100)/$loc['deep']>100)
    {
        $check="เกินความจุ";
        $color_label="danger";
    }
    else if((($loc['level']*100)/$loc['deep']>80) and (($loc['level']*100)/$loc['deep']<=100))
    {
        $check="น้ำมาก";
        $color_label="warning";
    }
    else if((($loc['level']*100)/$loc['deep']>50) and (($loc['level']*100)/$loc['deep']<=80))
    {
        $check="น้ำปานกลาง";
        $color_label="success";
    }
    else if((($loc['level']*100)/$loc['deep']>30) and (($loc['level']*100)/$loc['deep']<=50))
    {
        $check="น้ำน้อย";
        $color_label="warning";
    }
    else
    {
        $check="น้ำน้อยวิกฤติ";
        $color_label="danger";
    }
    }
    else
    {
    if (($loc['level']*100)/$loc['deep']>100)
    {
        $check="ไม่แสดง";
        $color_label="danger";
    }
    else if((($loc['level']*100)/$loc['deep']>80) and (($loc['level']*100)/$loc['deep']<=100))
    {
        $check="ไม่แสดง";
        $color_label="danger";
    }
    else if((($loc['level']*100)/$loc['deep']>50) and (($loc['level']*100)/$loc['deep']<=80))
    {
        $check="ไม่แสดง";
        $color_label="danger";
    }
    else if((($loc['level']*100)/$loc['deep']>30) and (($loc['level']*100)/$loc['deep']<=50))
    {
        $check="ไม่แสดง";
        $color_label="danger";
    }
    else
    {
        $check="ไม่แสดง";
        $color_label="danger";
    }
        $L="warning";
        $check1 = "ไม่ได้ใช้งาน";
    }
    ?>
    <?php echo $loc["lat"]; ?>,
    <?php echo $loc["long"]; ?>,
    '<img src="uploadphoto/<?php echo $loc["url"]; ?>" width="auto" height="60">'+
    '<h2><?php echo $loc["info"]; ?></h2>'+'<?php echo $loc["info1"]; ?>' +
    '<p><?echo $g2?> ระดับน้ำในปัจจุบัน <?php echo $loc["level"]; ?> เมตร'+
        '<p>อัพเดทข้อมูลล่าสุดเมื่อวันที่ <?php echo $loc["date"]; ?> เวลา <?php echo $loc["time"]; ?>'+'<br><br>'+
            'สถานะของเครื่อง <span class="label label-<?echo $L?>"><?echo $check1?></span>'+'<br><br>'+
            'สถานะระดับน้ำ <span class="label label-<?echo $color_label?>"><?echo $check?></span>'
            );
            <?php
            } ?>
            center = bounds.getCenter();
            map.fitBounds(bounds);
            }
            </script>
            <body onload="initMap()" >
                <div id="map"></div>
                <?php
                mysqli_close($connect);
                ?>
            </body>
        </html>