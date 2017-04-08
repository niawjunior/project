<?php
session_start();
$ID = $_SESSION["ID"];
require_once("connect.php");
require_once("config_home.php");
if( $_SESSION["lang"] == "")
{
    $_SESSION["lang"] = "th";
    $_SESSION["strwater"] = "ระดับน้ำ";
    $_SESSION["strmap"] = "แผนที่";
    $_SESSION["strgraph"] = "กราฟ";
    $_SESSION["strreport"] = "รายงานผล";
    $_SESSION["strmember"] = "สมาชิก";
    $_SESSION["strprofile"] = "ข้อมูลส่วนตัว";
    $_SESSION["stractivity"] = "บันทึก";
    $_SESSION["strmore"] = "อื่นๆ";
    $_SESSION["strh1"] = "ตั้งค่าระบบ";
    $_SESSION["strh2"] = "เฉพาะผู้ดูและระบบเท่านั้น";
    $_SESSION["strh3"] = "วันที่/เวลา";
    $_SESSION["strh4"] = "ระบบล็อกอิน";
    $_SESSION["strh5"] = "ระบบบันทึก&รายงาน";
    $_SESSION["strh6"] = "ระบบเปลี่ยนภาษา";
    $_SESSION["strh7"] = "ระบบสำรองข้อมูล";
    $_SESSION["strh8"] = "ภาษาไทย";
    $_SESSION["strh9"] = "ภาษาอังกฤษ";
    $_SESSION["strh10"] = "บันทึกกิจกรรม";
    $_SESSION["strh11"] = "รายงานระดับน้ำ";
    $_SESSION["strh12"] = "สำรองข้อมูล";
    $_SESSION["strh13"] = "สร้าง/ลบ ฐานข้อมูล";
    $_SESSION["strh14"] = "รายละเอียด/สถานะต่างๆ";
    $_SESSION["strh15"] = "ตกลง";
}
?>
<?php
$status=0;
$connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
?>
<?php
$objQuery_SETTING = mysqli_query($connect,"SELECT * FROM setting");
$objQuery5 = mysqli_query($connect,"SELECT * FROM member WHERE ID='$ID'");
while($objResult5 = mysqli_fetch_array($objQuery5))
{
$CHECKPHOTO = $objResult5['img'];
}
if($CHECKPHOTO=="")
{
$logoprofile = 'photo/user.png';
}
else
{
$logoprofile = $CHECKPHOTO;
}
while($objResult_SETTING = mysqli_fetch_array( $objQuery_SETTING))
{
$f_register = $objResult_SETTING['type_register'];
}
?>
<?php
if($_SESSION["status"] == "ADMIN")
{
$PAGE = "profile.php";
$type_user ="ผู้ดูแลระบบ";
}
else
{
$PAGE = "profile.php";
$type_user ="ผู้ใช้งานทั่วไป";
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>
    WATER LEVEL
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/all.css" rel="stylesheet">
  </head>
  
  <body class="background">
<?php require_once( "modules/function_nav.php");?>
?>
<style>
body { padding-top:3px;
}
.panel-body .btn:not(.btn-block) { width:135px;margin-bottom:4px; }
</style>
<div class="container box-shadow " id="main-container" style="margin-top: 12px;">
<br>
<?php
if($_SESSION["status"] == "ADMIN" or $_SESSION["status"]=="USER")
{
require_once("modules/function_main.php");
}
?>
<?php
if($_GET["Action"] == "Multiple")
{
?>
<div align="right">
  <a  href="<?php echo $_SERVER["PHP_SELF"];?>?Action=Find" class="btn btn-sm" role="button"><span class="glyphicon glyphicon-search"></span>ค้นหา</a>
</div>
<div class="row">
  <div class="col-md-12" >
    <IFRAME src=multiple.php width=100% height=65% frameborder=0 scrolling=no>
    </IFRAME>
  </div>
</div>
<IFRAME src=place.php width=100% height=90% frameborder=0 scrolling=no>
</IFRAME>
<?php
}
?>
<?php
if($_GET["Action"] == "Find")
{
?>
<div align="right">
  <a  href="<?php echo $_SERVER["PHP_SELF"];?>?Action=Multiple" class="btn btn-sm" role="button">  <span class="glyphicon glyphicon-arrow-left"></span>ย้อนกลับ</a>
</div>
<div class="row">
  <div class="col-md-12" >
    <IFRAME src=find.php width=100% height=60% frameborder=0 scrolling=no>
    </IFRAME>
  </div>
</div>
<IFRAME src=place.php width=100% height=70% frameborder=0 scrolling=no>
</IFRAME>
<?php
}
?>
<?php
if($_GET["Action"] == "Setting?Backup")
{
?>
<div class="row">
  <div class="col-md-12" >
    <IFRAME src=mysql_backup.php width=100% height=80% frameborder=0 scrolling=no>
    </IFRAME>
  </div>
</div>
<?php
}
?>
<?php
if($_GET["Action"] == "Setting?Status")
{
?>
<div class="row">
  <div class="col-md-12" >
    <IFRAME src=status_db.php width=100% height=100% frameborder=0 scrolling=no>
    </IFRAME>
  </div>
</div>
<?php
}
?>
<?php
if($_GET["Action"] == "Setting?Create")
{
?>
<div class="row">
  <div class="col-md-12" >
    <IFRAME src=create_database.php width=100% height=100% frameborder=0 scrolling=no>
    </IFRAME>
  </div>
</div>
<?php
}
?>
<?php
if($_GET["Action"] == "Member")
{
?>
<div class="row">
  <div class="col-md-12" >
    <IFRAME src=member.php width=100% height=100% frameborder=0 scrolling=no>
    </IFRAME>
  </div>
</div>
<?php
}
?>
<?php
if($_GET["Action"] == "News")
{
?>
<div class="row">
  <div class="col-md-12" >
    <IFRAME src=news.php width=100% height=100% frameborder=0 scrolling=no>
    </IFRAME>
  </div>
</div>
<?php
}
?>
<?php
if($_GET["Action"] == "Display")
{
?>
<div class="row">
  <div class="col-md-12" >
    <IFRAME src=data.php width=100% height=170% frameborder=0 scrolling=no>
    </IFRAME>
  </div>
</div>
<?php
}
?>
<?php
if($_GET["Action"] == "Graph")
{
?>
<div class="row">
  <div class="col-md-12" >
    <IFRAME src=graph.php width=100% height=75% frameborder=0 scrolling=no>
    </IFRAME>
  </div>
</div>
<?php
}
?>
<?php
if($_GET["Action"] == "")
{
?>
<IFRAME src=data.php width=100% height=170% frameborder=0 scrolling=no>
</IFRAME>
<?php
}
?>
<?php
if($_GET["Action"] == "Activity")
{
?>
<div class="row">
  <div class="col-md-12" >
    <IFRAME src=activity.php width=100% height=100% frameborder=0 scrolling=no>
    </IFRAME>
  </div>
</div>
<?php
}
?>
<?php
if($_GET["Action"] == "Profile")
{
?>
<IFRAME src=admin_profile.php width=100% height=100% frameborder=0 scrolling=no>
</IFRAME>
<?php
}
?>
<?php
if($_GET["Action"] == "Setting")
{
require_once("modules/function_setting.php");
}
?>
</body>
</html>