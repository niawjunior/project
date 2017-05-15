<?php
error_reporting(E_ERROR | E_PARSE);
$host="localhost";
$user="root";
$pass="niaw2362537";
$db="u220965490_water";
$ftp_server = "water-pj.esy.es";
$ftp_username = "u220965490.niawjunior";
$ftp_userpass = "niaw2362537";
$connect = mysqli_connect($host,$user,$pass,$db);
$pdo = new PDO("mysql:dbname={$db};host={$host}", $user, $pass);
$USER = $_SESSION["USER"];
date_default_timezone_set('Asia/Bangkok');
$time_log = time();
$date = date("d-m-Y");
$time = date("H:i:s");
mysqli_query($connect,"UPDATE member SET time_log = '$time_log' WHERE user ='$USER' ");
$pdo = new PDO("mysql:dbname={$db};host={$host}", $user, $pass);

?>