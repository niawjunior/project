<?php
//session start//
session_start();
$ID = $_SESSION["ID"];

//set timezone//
date_default_timezone_set('Asia/Bangkok');

//include connect,config_home,check_connect//
require_once ("connect.php");
require_once ("config_home.php");
require_once ("check_connect.php");

//connect database//
$connect = mysqli_connect($host, $user, $pass, $db);
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link href="css/all.css" rel="stylesheet">
        <title>
        WATER LEVEL
        </title>
    </head>
    <body class="background">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header hidden-sm">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" style="border:1px solid #0B4D61">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar" style="background:#fff"></span>
                    <span class="icon-bar" style="background:#fff"></span>
                    <span class="icon-bar" style="background:#fff"></span>
                    </button>
                    <a class="navbar-brand" href="home.php" onclick="getHome();">WATER LEVEL
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li id="tab_active_home">
                            <a href="home.php">
                                <span class="glyphicon glyphicon-home" aria-hidden="true">
                                </span>
                            </a>
                        </li>
                       <li id="tab_active_weather"><a href="">ที่มาและความสำคัญ</a>
                    </li>
                   <li id="tab_active_research"><a href="">วิธีการติดตั้ง/ใช้งาน</a>
                </li>
            </ul>
            <? if($_SESSION[ "STATUS"]=="" ) { require_once( "modules/function_login.php"); } else { require_once( "modules/function_loged.php"); } ?>
        </div>
    </div>
</nav>
<? include "status_level.php"; ?>
<div class="container box-shadow " id="main-container" style="margin-top: 50px;">
    <div class="row">
        <img src="photo/logo.png" class="img-responsive">
    </div>
    <div class="row box-shadow">
        <ol class="breadcrumb">
        </ol>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h4>
            <li class="glyphicon glyphicon-map-marker" aria-hidden="true"></li>
            แผนที่ติดตั้งเครื่องวัดระดับน้ำ
            </h4>
            <iframe src="multiple.php" width="560" height="900" scrolling="no" frameBorder="0">
            </iframe>
        </div>
        <div class="col-md-6">
            <h4>
            <li class="glyphicon glyphicon-tree-deciduous" aria-hidden="true"></li>
            สถานที่ที่ใช้ทดสอบ:  <font  color="#428bca"><?=$showh1?></font>
            <li class="glyphicon glyphicon-alert" aria-hidden="true"></li>
            สถานะ: <?if($check==""){$check1="ไม่ได้เชื่อมต่อ";}else{$check1=$check;}?><font  color="#428bca"><?=$check1?></font>
            </h4>
            <div class="col-md-12">
                 <span class="label label-danger"><?php echo '<=30 น้ำน้อยวิกฤติ'?></span>
            <span class="label label-warning"><?php echo '>30-50% น้ำน้อย'?></span>
            <span class="label label-success"><?php echo '>50-80% น้ำปานกลาง'?></span>
            <span class="label label-warning"><?php echo '>80-100% น้ำมาก'?></span>
            <span class="label label-danger"><?php echo '>100% เกินความจุ'?></span>
            </div>
           <br>
            <h4>
            <li class="glyphicon glyphicon-chevron-up" aria-hidden="true"></li>
            ระดับน้ำสูงสุด: <font  color="#428bca"><?=$max?></font> เมตร
            <li class="glyphicon glyphicon-chevron-down" aria-hidden="true"></li> ระดับน้ำต่ำสุด: <font  color="#428bca"><?=$min?></font> เมตร
            </h4>
            <div class="col-xs-12 col-sm-12 progress-container">
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-primary" style="width:0%">
                        <? echo "ระดับน้ำใน ".$showh1. " ".number_format($persen, 2, ',', ' '); ?>%
                    </div>
                </div>
            </div>
            <script>
            $(".progress-bar").animate({
            width: "<? echo $persen ?>%"
            }, 1500);
            </script>
            <h4>
            <li class="glyphicon glyphicon-tint" aria-hidden="true"></li>
            ปริมาณน้ำ ย้อนหลัง (ทั้งหมด)&nbsp;&nbsp;&nbsp;&nbsp;
            ล่าสุดวันที่ : <font  color="#428bca"><?=$f44?></font> เวลา : <font  color="#428bca"><?=$lasttime?></font>
            </h4>
            <iframe src="water_level.php" width="100%" height="55%" scrolling="no" frameBorder="0"></iframe>
            <h4>
            <li class="glyphicon glyphicon-tint" aria-hidden="true"></li>
            รายงาน/ข่าวสาร ระดับน้ำ (ย้อนหลัง)
            </h4>
            <iframe src="news_upload.php" width="100%" height="55%" scrolling="no" frameBorder="0">
            </iframe>
        </div>
    </div>
    <h4>
    <li class="glyphicon glyphicon-tree-deciduous" aria-hidden="true"></li>
    สถานที่ติดตั้งเครื่องวัดระดับน้ำ.
    </h4>
    <iframe src="showpage.php" width="100%" height="55%" scrolling="no" frameBorder="0">
    </iframe>
    <h4>
    <li class="glyphicon glyphicon-signal" aria-hidden="true">
    </li>
    กราฟแสดงปริมาณน้ำใน <font  color="#428bca"><?=$showh1?></font> 24 ชม.ย้อนหลัง
    </h4>
    <iframe src="graph1.php" width="100%" height="50%" scrolling="no" frameBorder="0">
    </iframe>
</div>
</body>
</html>