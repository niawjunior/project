<?
session_start();
$ID = $_SESSION["ID"];
require_once("config_home.php");
require_once ("connect.php");
?>
<html lang="en">
   <head>
		<meta charset="utf-8" />
		<link href="css/all.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
    <!-- Custom CSS -->
    <!-- Custom Fonts -->
      <title>
      WATER LEVEL
      </title>
      <style>
#container {
	min-width: 320px;
	max-width: 600px;
	margin: 0 auto;
}
</style>
   </head>
   <body class="background">
<?php require_once( "modules/function_nav.php");?>
<div class="container box-shadow " id="main-container" style="margin-top: 50px;">
<br>
<div class="content-section-b">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-heading">ที่มาและความสำคัญของปัญหา</h2>
                    <p class="lead">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;การตรวจวัดระดับน้ำในแหล่งน้ำชุมชน ได้มีหน่วยงานที่คอยดูแลตรวจวัดและจัดการปริมาณน้ำที่ปล่อยน้ำออกไปเพื่อให้ประชาชนได้ใช้บริโภคอุปโภค เช่น กรมชลประทาน เป็นต้น  โดยได้มีการใช้คนและเครื่องมือในบันทึกข้อมูล ซึ่งใช้งบประมาณค่อนข้างแพง และต้องใช้ผู้เชียวชาญเฉพาะด้านเข้ามาควบคุม <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จากปัญหาข้างต้น ผู้จัดทำ จึงสนใจสร้าง <FONT COLOR="#0e5064">"ระบบตรวจวัดระดับน้ำในแหล่งชุมชน ผ่านระบบสารสนเทศภูมิศาสตร์"</FONT> เป็นกรณีศึกษาขึ้นมา<br>เพื่อให้เกิดความสะดวกในการวัดและตรวจสอบปริมาณน้ำ โดยสามารถตรวจสอบปริมาณน้ำผ่านทางเว็บไซต์ เพื่อความสะดวกและรวดเร็วในการคาดการณ์<br>และตรวจวัดปริมาณน้ำที่เพิ่มขึ้นหรือลดลง พร้อมทั้งช่วยประหยัดค่าใช่จ่ายในการติดตั้งอุปกรณ์และจ้างบุคลากรได้อีกด้วย</p>
                </div>
                <div class="col-lg-5 col-lg-offset-3 col-sm-6">
                    <img class="img-responsive img-thumbnail" src="img/water_level.jpg" alt="">
                </div>
            </div>
        </div>
        </div>
<br><br><br>
    <div class="content-section-b">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">        
                    <img class="img-responsive" src="img/ipad.png" alt="" width="97%">
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">


                     <h2 class="section-heading">การดำเนินงาน</h2>
                    <p class="lead">Turn your 2D designs into high quality, 3D product shots in seconds using free Photoshop actions by <a target="_blank" href="http://www.psdcovers.com/">PSDCovers</a>! Visit their website to download some of their awesome, free photoshop actions!</p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="content-section-b">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">    
                    <h2 class="section-heading">3D Device Mockups<br>by PSDCovers</h2>
                    <p class="lead">Turn your 2D designs into high quality, 3D product shots in seconds using free Photoshop actions by <a target="_blank" href="http://www.psdcovers.com/">PSDCovers</a>! Visit their website to download some of their awesome, free photoshop actions!</p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="img/dog.png" alt="">
                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>




<script>
var chart = Highcharts.chart('container', {

    title: {
        text: 'Chart.update'
    },

    subtitle: {
        text: 'Plain'
    },

    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },

    series: [{
        type: 'column',
        colorByPoint: true,
        data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
        showInLegend: false
    }]

});


$('#plain').click(function () {
    chart.update({
        chart: {
            inverted: false,
            polar: false
        },
        subtitle: {
            text: 'Plain'
        }
    });
});

$('#inverted').click(function () {
    chart.update({
        chart: {
            inverted: true,
            polar: false
        },
        subtitle: {
            text: 'Inverted'
        }
    });
});

$('#polar').click(function () {
    chart.update({
        chart: {
            inverted: false,
            polar: true
        },
        subtitle: {
            text: 'Polar'
        }
    });
});

</script>
