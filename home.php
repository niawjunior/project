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
        <script src="assets/js/bootstrap-notify.min.js"></script>
        <script src="assets/js/welcome_alert.js"></script>
        <script src="assets/js/bootstrap-notify.js"></script>
        <link href="assets/css/all.css" rel="stylesheet">
            <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <title>
        WATER LEVEL
        </title>
        <style>
#myFooter .container{
    text-align: center;
}


#myFooter .footer-social{
    text-align: center;
    padding-top: 25px;
    padding-bottom: 25px;
    background-color: #ffffff;
}

#myFooter .fa{
    font-size: 25px;
    margin-right: 15px;
    margin-left: 20px;
    background-color: white;
    color: #d0d0d0;
    border-radius: 51%;
    padding: 10px;
    height: 60px;
    width: 60px;
    text-align: center;
    line-height: 43px;
    text-decoration: none;
    transition:color 0.2s;
}

#myFooter .fa-facebook:hover{
   color: #2b55ff;
}

#myFooter .fa-facebook:focus{
    color: #2b55ff; 
}

#myFooter .fa-github:hover{
   color: #3c5156;
}

#myFooter .fa-github:focus{
    color: #3c5156; 
}



#myFooter .fa-google-plus:hover{
    color:red;
}

#myFooter .fa-google-plus:focus{
    color:red;
}

.content{
   flex: 1 0 auto;
   -webkit-flex: 1 0 auto;
   min-height: 200px;
}

#myFooter{
   flex: 0 0 auto;
   -webkit-flex: 0 0 auto;
}
</style>
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
                <div class="col-md-12">
                <div class="form-group">
                <span class="label label-danger"><?php echo '<=30 น้ำน้อยวิกฤติ'?></span>&nbsp;&nbsp;
                <span class="label label-warning"><?php echo '>30-50% น้ำน้อย'?></span>&nbsp;&nbsp;
                <span class="label label-success"><?php echo '>50-80% น้ำปานกลาง'?></span>&nbsp;&nbsp;
                <span class="label label-warning"><?php echo '>80-100% น้ำมาก'?></span>&nbsp;&nbsp;
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
	<font  color="#428bca">(<?php echo $showh1?>)</font> 10 ครั้งล่าสุด</h4>
	<iframe src="graph1.php" width="100%" height="50%" scrolling="yes" frameBorder="0">	
	</iframe>
<footer id="myFooter">
        <div class="footer-social">
            <a href="https://www.facebook.com/niawjunior.Official" class="social-icons"><i class="fa fa-facebook"></i></a>
            <a href="https://plus.google.com/+niawjunior" class="social-icons"><i class="fa fa-google-plus"></i></a>
            <a href="https://github.com/niawjunior" class="social-icons"><i class="fa fa-github"></i></a>
            <br>Copyright © 2017 | RMUTI | TEC4N2
        </div>
    </footer>
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
     alert();
  </script>
  