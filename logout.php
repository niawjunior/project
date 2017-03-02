<?
session_start();
require_once("connect.php");
$connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
mysqli_query($connect,"UPDATE member SET on_off = 'OFFLINE' WHERE ID ='".$_SESSION["ID"]."' ");
unset($_SESSION["status"]);
unset($_SESSION["STATUS"]);
unset($_SESSION["USER"]);
header("location:home.php");
?>