<?
session_start();
?>
<br><br><br>
<center>
<?php
	require_once("connect.php");
	require_once("config_home.php");
	$remember = $_POST['b1'];
	$connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
	$username2 = $_POST['username'];
	$password2=md5(md5(md5($_POST['password'])));
	$strSQL = mysqli_query($connect,"SELECT * FROM member WHERE (user = '$username2' or email = '$username2')  and pass = '$password2'");
	$objResult = mysqli_fetch_array($strSQL);
	if(!$objResult)
	{
?>
<script>
$(window).load(function()
{
$('#myModal').modal('show');
setTimeout("location.href = 'home.php';",5000);
});
</script>
<div class="container">
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง</h4>
				</div>
				<div class="modal-body">
					<p>กรุณาล็อกอินเพื่อเข้าสู่ระบบอีกครั้ง.</p>
				</div>
				<div class="modal-footer">
				<a href="reset_password.php"><h5>ลืมรหัสผ่าน</h5></a>
				</div>
			</div>
		</div>
	</div>
</div>
<?
}
else
{
date_default_timezone_set('Asia/Bangkok');
$date = date("d-m-Y");
$time = date("H:i:s");
if($remember=='B1')
{
$_SESSION["pass"] = $_POST['password'];
$_SESSION["user"] = $_POST['username'];;
$_SESSION["EMAIL"] = $objResult["email"];
}

else
{
unset($_SESSION["EMAIL"]);
unset($_SESSION["user"]);
unset($_SESSION["pass"]);
}
mysqli_query($connect,"UPDATE member SET on_off = 'ONLINE' WHERE user ='".$objResult["user"]."' ");
mysqli_query($connect,"UPDATE member SET time = '$time',date = '$date' WHERE user ='".$objResult["user"]."' ");
$_SESSION["ID"] = $objResult["ID"];
$_SESSION["USER"] = $objResult["user"];
$_SESSION["PASS"] = $objResult["pass"];
$_SESSION["PHOTO"] = $objResult["img"];
$_SESSION["SEX"] = $objResult["sex"];
$_SESSION["status"] = $objResult["status"];
$_SESSION["STATUS"] = 1;
session_write_close();
header("location:home.php");
}
?>
</center>