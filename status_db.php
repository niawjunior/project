<?php
session_start();
    if($_SESSION["STATUS"]=='')
    {
      header('Location: 404.php');
      exit();
    }
include "config.php";
include "connect.php";
?>
<?php
$connect = mysqli_connect($host,$user,$pass);
if($connect)
{
    $status_db = 'ONLINE';
}
else
{
    $status_db = 'OFFLINE';
}
?>
<?php
$mysqli = new mysqli($host,$user,$pass);
$server = ($mysqli->server_info);
$host_info = ($mysqli->host_info);
?>
<?php
$total = (GetDirectorySize('')/1024)/1024;
function GetDirectorySize($path){
$bytestotal = 0;
$path = realpath($path);
if($path!==false){
foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object){
$bytestotal += $object->getSize();
}
}
return $bytestotal;
}
?>
<?php
$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);
if($login)
{
    $status_ftp = 'ONLINE';
}
else
{
    $status_ftp = 'OFFLINE';
}
ftp_close($ftp_conn);
?>
<?php
$status =  GetServerStatus('rmuti-water.com','80');
function GetServerStatus($site, $port)
{
    $status = array("OFFLINE", "ONLINE");
    $fp = @fsockopen($site, $port, $errno, $errstr, 2);
    if (!$fp)
    {
        return $status[0];
    }
    else
    {
        return $status[1];
    }
}
?>
<br>
<link rel="stylesheet" type="text/css" href="assets/css/create_database.css"><div class="backup_main">
<div class="main">
    <fieldset><legend><h2>รายละเอียดของฐานข้อมูล</h2></legend>
    <form name="frmMain" method="post" action="<?=$_SERVER["PHP_SELF"];?>" enctype="multipart/form-data">
        <input type="hidden" name="hdnCmd" value="">
        <div><h3>ชื่อเซิฟเวอร์ (Server Name):</h3><br><h4><?php echo $host_info ?></h4></div>
        <div class="cls"></div>
        <div><h3>ดาต้าเบสและเวอร์ชั่นที่ใช้ (Server Database):</h3><br><h4>MySQL server version <?php echo $server ?></h4></div>
        <div class="cls"></div>
        <div><h3>เว็บเซิฟเวอร์ (web server) :</h3><br><h4><?php echo $_SERVER["SERVER_SOFTWARE"];?></h4></div>
        <div class="cls"></div>
        <div><h3>ชื่อฐานข้อมูล (Database Name):</h3><br><h4><?php echo $db?></h4></div>
        <div class="cls"></div>
        <div style="text-align: center;margin-top: 50px"></div>
        <div class="cls"></div>
    </form>
</fieldset>
</div>
</div>
<div class="main">
<fieldset>
<legend><h2>สถานะต่างๆ &nbsp;<img src="photo/useron.gif" height ="20" width="auto" ></h2></legend>
<form name="frmMain" method="post" action="<?=$_SERVER["PHP_SELF"];?>" enctype="multipart/form-data">
    <input type="hidden" name="hdnCmd" value="">
    <div><h3>สถานะการเชื่อมต่อเว็บไซต์ (HTTP):</h3><br><h4><?php echo $status?></h4></div>
    <div class="cls"></div>
    <div><h3>สถานะการเชื่อมต่อฐานข้อมูล (Database):</h3><br><h4><?php echo $status_db?></h4></div>
    <div class="cls"></div>
    <div><h3>สถานะการถ่ายโอนไฟล์ (FTP):</h3><br><h4><?php echo $status_ftp?></h4></div>
    <div class="cls"></div>
    <div><h3>พื้นที่ที่ใช้ไป (Disk Space):</h3><br><h4><?php echo number_format($total, 2, '.', ''); ?> MB</h4></div>
    <div class="cls"></div>
    <div style="text-align: center;margin-top: 50px"></div>
    <div class="cls"></div>
</form>
</fieldset>
</div>
</div>