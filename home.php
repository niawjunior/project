<?php
session_start();
$ID = $_SESSION["ID"];
require_once ("connect.php");
require_once ("config.php");
require_once ("check_connect.php");
require_once("lang.php");
$connect = mysqli_connect($host, $user, $pass, $db);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="assets/css/all.css" rel="stylesheet">
        <title>
        WATER LEVEL
        </title>
    </head>

<body class="background">
<?php require_once( "modules/function_nav.php");?>
<?php include "status_level.php"; ?>
<div class="container box-shadow " id="main-container" style="margin-top: 50px;">
	<div class="row">
        <img src="photo/logo.png" class="img-responsive">
    </div>
    <div class="row box-shadow">
    	<ol class="breadcrumb"></ol>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h4><li class="glyphicon glyphicon-map-marker" aria-hidden="true"></li>
            แผนที่ติดตั้งเครื่องวัดระดับน้ำ</h4>
            <iframe src="multiple.php" width="560" height="900" scrolling="yes" frameBorder="0"></iframe>
        </div>
        <div class="col-md-6">
            <h4>
            	<li class="glyphicon glyphicon-tree-deciduous" aria-hidden="true"></li>
            สถานที่ที่ใช้ทดสอบ:  <font  color="#428bca"><?php echo $showh1?></font>
            	<li class="glyphicon glyphicon-alert" aria-hidden="true"></li>
            สถานะ: <?php if($check==""){$check1="ไม่ได้เชื่อมต่อ";}else{$check1=$check;}?><font  color="#428bca"><?php echo $check1?></font>

                </h4>
                <div class="col-xs-12 col-sm-12">
                <div class="row">
                <span class="label label-danger"><?php echo '<=30 น้ำน้อยวิกฤติ'?></span>
                <span class="label label-warning"><?php echo '>30-50% น้ำน้อย'?></span>
                <span class="label label-success"><?php echo '>50-80% น้ำปานกลาง'?></span>
                <span class="label label-warning"><?php echo '>80-100% น้ำมาก'?></span>
                <span class="label label-danger"><?php echo '>100% เกินความจุ'?></span>
                </div>
                </div>
           <br>
            <h4>
            	<li class="glyphicon glyphicon-chevron-up" aria-hidden="true"></li>
            ระดับน้ำสูงสุด: <font  color="#428bca"><?php echo $max?></font> เมตร
            	<li class="glyphicon glyphicon-chevron-down" aria-hidden="true"></li> ระดับน้ำต่ำสุด: <font  color="#428bca"><?php echo $min?></font> เมตร
            	</h4>
            <div class="col-xs-12 col-sm-12 progress-container">
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-primary" style="width:0%">
                        <?php echo "ระดับน้ำ (".$showh1. ") ".number_format($persen, 2, ',', ' '); ?>%
                    </div>
                </div>
            </div>
            <script>
                $(".progress-bar").animate({
                width: "<?php  echo $persen ?>%"
                }, 1500);
            </script>
            <h4>
            <li class="glyphicon glyphicon-tint" aria-hidden="true"></li>
            ปริมาณน้ำย้อนหลัง (ทั้งหมด)
            ล่าสุดวันที่ : <font  color="#428bca"><?php echo $f44?></font> เวลา : <font  color="#428bca"><?php echo $lasttime?></font>
            </h4>
            <iframe src="water_level.php" width="100%" height="55%" scrolling="no" frameBorder="0"></iframe>
            <h4><li class="glyphicon glyphicon-tree-deciduous" aria-hidden="true"></li>
            สถานที่ติดตั้งเครื่องวัดระดับน้ำ</h4>
            <iframe src="showpage.php" width="100%" height="55%" scrolling="yes" frameBorder="0">
            	</iframe>
        </div>
    </div>
	<h4><li class="glyphicon glyphicon-signal" aria-hidden="true"></li> กราฟแสดงปริมาณน้ำใน 
	<font  color="#428bca"><?php echo $showh1?></font> 24 ชม.ย้อนหลัง</h4>
	<iframe src="graph1.php" width="100%" height="50%" scrolling="yes" frameBorder="0">	
	</iframe>
</div>
</body>
</html>
  <script>
    $('body').show();
    $('.version').text(NProgress.version);
    NProgress.start();
    setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 1000);
    NProgress.done();
  </script>

<script type="text/javascript">
      $.notify({
    message: 'ยินดีต้อนรับเข้าสู่เว็บไซต์'
},{
    element: 'body',
    position: null,
    type: "success",
    allow_dismiss: true,
    newest_on_top: false,
    showProgressbar: false,
    placement: {
        from: "top",
        align: "right"
    },
    offset: {
        x: 10,
        y: 54
    },
    spacing: 10,
    z_index: 1031,
    delay: 4000,
    timer: 1000,
    url_target: '_blank',
    mouse_over: null,
    animate: {
        enter: 'animated bounceIn',
        exit: 'animated bounceOut'
    },
    template: '<div data-notify="container" class="col-sm-2 col-sm-2 alert alert-{0}" role="alert">' +
        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
        '<span data-notify="message">{2}</span>' +
    '</div>' 
});
  </script>
  <script type="text/javascript">
      $.notify({
    // options
    message: 'ระดับน้ำในปัจุบัน' +' '+'<?php echo $f55?>'+' เมตร'
},{
    // settings
    element: 'body',
    position: null,
    type: "info",
    allow_dismiss: true,
    newest_on_top: false,
    showProgressbar: false,
    placement: {
        from: "top",
        align: "right"
    },
    offset: {
        x: 10,
        y: 54
    },
    spacing: 10,
    z_index: 1031,
    delay: 4000,
    timer: 1000,
    url_target: '_blank',
    mouse_over: null,
    animate: {
        enter: 'animated bounceIn',
        exit: 'animated bounceOut'
    },
    template: '<div data-notify="container" class="col-sm-2 col-sm-2 alert alert-{0}" role="alert">' +
        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
        '<span data-notify="message">{2}</span>' +
    '</div>' 
});
  </script>

  