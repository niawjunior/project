<?php
require_once("connect.php");
$objQuery6 = mysqli_query($connect,"SELECT * FROM member WHERE ID='$ID'");
while($objResult6 = mysqli_fetch_array($objQuery6))
{
	$CHECKPHOTO = $objResult6['img'];
}
if($CHECKPHOTO=="")
{
	$logoprofile = 'photo/user.png';
}
else
{
	$logoprofile = $CHECKPHOTO;
}
if($_SESSION["status"] == "ADMIN")
{
	$PAGE = "profile.php";
	$type_user ="ผู้ดูแลระบบ";
}
else if ($_SESSION["status"] =="BAN")
{
	$PAGE = "404.php";
	$type_user ="ระงับการใช้งาน";
}
else
{
	$PAGE = "profile.php";
	$type_user ="ผู้ใช้งานทั่วไป";
}
?>