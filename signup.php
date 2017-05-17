<?php
session_start();
require_once("connect.php");
require_once("config.php");
?>
<br><br><br>
<center>
<?php
$connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
$username1 = $_POST['username'];
$email1 = $_POST['email'];
$question = $_POST['question'];
$answer = $_POST['answer'];
$password1=md5(md5(md5($_POST['password2'])));
$objQuery1 = mysqli_query($connect,"SELECT * FROM member WHERE user = '".trim($_POST['username'])."' OR  email = '".trim($_POST['email'])."' ");
$objResult1 = mysqli_fetch_array($objQuery1);
if($objResult1)
{
	?>
	<script>
	top.location.href=("signup_check.php?Success=FALSE")
	</script>
	<?php
}
else
{
	$objResult=mysqli_query($connect,"INSERT INTO member (user,pass,email,status,question,answer) VALUE ('$username1','$password1','$email1','USER','$question','$answer')");
	?>
	<script>
	top.location.href=("signup_check.php?Success=TRUE")
	</script>
	<?php
}
?>
</center>
<?php
mysqli_close($connect);
?>