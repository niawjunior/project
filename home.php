<?php
session_start();
$ID = $_SESSION["ID"];
date_default_timezone_set('Asia/Bangkok');
require_once ("connect.php");
require_once ("config_home.php");
require_once ("check_connect.php");
$connect = mysqli_connect($host, $user, $pass, $db);
?>
<html lang="en">
    <head>
        <link href="css/all.css" rel="stylesheet">
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
        <iframe src="multiple.php" width="560" height="900" scrolling="no" frameBorder="0"></iframe>
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
        ปริมาณน้ำย้อนหลัง (ทั้งหมด)
        ล่าสุดวันที่ : <font  color="#428bca"><?=$f44?></font> เวลา : <font  color="#428bca"><?=$lasttime?></font>
        </h4>
        <iframe src="water_level.php" width="100%" height="55%" scrolling="no" frameBorder="0"></iframe>
        <h4><li class="glyphicon glyphicon-tint" aria-hidden="true"></li>
        รายงาน/ข่าวสาร ระดับน้ำ (ย้อนหลัง)</h4>
        <iframe src="news_upload.php" width="100%" height="55%" scrolling="no" frameBorder="0">
        	</iframe>
    </div>
</div>
	<h4><li class="glyphicon glyphicon-tree-deciduous" aria-hidden="true"></li> สถานที่ติดตั้งเครื่องวัดระดับน้ำ</h4>
	<iframe src="showpage.php" width="100%" height="55%" scrolling="no" frameBorder="0"></iframe>
	<h4><li class="glyphicon glyphicon-signal" aria-hidden="true"></li> กราฟแสดงปริมาณน้ำใน 
	<font  color="#428bca"><?=$showh1?></font> 24 ชม.ย้อนหลัง</h4>
	<iframe src="graph1.php" width="100%" height="50%" scrolling="no" frameBorder="0">	
	</iframe>
</div>
    <script type="text/javascript">
    $(function(){
         $.bootstrapGrowl('ระดับน้ำในปัจจุบัน <?php echo $f55;?> เมตร',{
            type: 'info',
            delay: 5000,
            width: 200,
             offset: {from: 'top', amount: 7},
             align: 'right',
             //allow_dismiss: false,
        });
            $.bootstrapGrowl('สถานะ (<?php echo $check;?>)',{
            type: '<?php if($check=='เกินความจุ'){?>danger<?}else if($check=='น้ำมาก'){?>warning<?}else if($check=='น้ำปานกลาง'){?>success<?} else if($check=='น้ำน้อย'){?>warning<?} else{?>danger<?}?>',
            delay: 5000,
            width: 200,
             offset: {from: 'top', amount: 7},
             align: 'right',
             //allow_dismiss: false,
        });
    });
</script>
</body>
</html>


	        <script type="text/javascript">
		var headID = document.getElementsByTagName("head")[0];
		var newCss = document.createElement('link');
		newCss.rel = 'stylesheet';
		newCss.type = 'text/css';
		window._botUsername = '409084';
		window._botName = 'เจ้าหน้าที่ชั่วคราว (บอท)';
		newCss.href = "http://rebot.me/assets/css/bot.css";
		var newScript = document.createElement('script');
		newScript.src = "http://rebot.me/assets/js/bot.js";
		newScript.type = 'text/javascript';
		headID.appendChild(newScript);
		headID.appendChild(newCss);
		</script>
	    
	    