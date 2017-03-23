<html>
<body>
<?php
	session_start();
	$username = $_POST['username'];
	$email = $_POST['email'];
	$ID = $_SESSION["ID"];
	date_default_timezone_set('Asia/Bangkok');
	require_once ("connect.php");
	require_once ("config_home.php");
	$connect = mysqli_connect($host, $user, $pass, $db);
	$objQuery = mysqli_query($connect,"SELECT * FROM member WHERE user='$username' and email='$email'");
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
	?>
	<script>
		$(window).load(function()
		{
		$('#myModal').modal('show');
		setTimeout("window.top.location.href = 'home.php';",3000);
		});
		</script>
		<div class="container">
		  <div class="modal fade" id="myModal" role="dialog">
		    <div class="modal-dialog">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">ไม่สามารถทำรายการได้</h4>
		        </div>
		        <div class="modal-body">
		          <p>ไม่มีชื่อผู้ใช้และอีเมลนี้ในระบบ.</p>
		        </div>
		        <div class="modal-footer">
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
			<?php
	}
	else
	{
			?>
			<script>
		$(window).load(function()
		{
		$('#myModal').modal('show');
		setTimeout("window.top.location.href = 'home.php';",3000);
		});
		</script>
		<div class="container">
		  <div class="modal fade" id="myModal" role="dialog">
		    <div class="modal-dialog">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">ทำรายการเสร็จเรียบร้อยแล้ว</h4>
		        </div>
		        <div class="modal-body">
		          <p>กรุณาเซ็คที่อีเมลเพื่อทำการสร้างรหัสผ่านใหม่.</p>
		        </div>
		        <div class="modal-footer">
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
		<meta charset="utf-8">
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
			<?
			$strTo = $objResult["email"];
			$strSubject = "Password Reset";
			$strHeader = "Content-type: text/html; charset=windows-874\n"; // or UTF-8 //
			$strHeader .= "From: webmaster\nReply-To: webmaster@thaicreate.com";
			$strMessage = "";
			$strMessage .= "Click the link below to set a new password: "."water-pj.esy.es/project_final/reset.php?user=";
			$strMessage .= "=================================<br>";
			$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader); 

		}
			?>
</body>
</html>