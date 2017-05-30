<?php
error_reporting(E_ERROR | E_PARSE);
$host="localhost";
// $user="rmutiwa_water";
$user="root";
$pass="niaw2362537";
$db="rmutiwa_water";
$ftp_server = "rmuti-water.com";
$ftp_username = "rmutiwa";
$ftp_userpass = "niaw2362537";
$connect = mysqli_connect($host,$user,$pass,$db);
mysqli_query($connect, "SET NAMES UTF8");
$USER = $_SESSION["USER"];
date_default_timezone_set('Asia/Bangkok');
$time_log = time();
$date = date("d-m-Y");
$time = date("H:i:s");
mysqli_query($connect,"UPDATE member SET time_log = '$time_log' WHERE user ='$USER' ");

?>