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
			<?php	
			$strTo = $email;
			$strSubject = "อีเมลฉบับบนี้ใช้สำหรับเปลี่ยนรหัสผ่านเท่านั้น";
			$strHeader = "Content-type: text/html; charset=windows-874\n"; // or UTF-8 //
		    $strHeader .= "From: webmaster@water-pj.esy.es";
			$strMessage = "";
			$strMessage .= "สวัสดีคุณ : ".$objResult["name"]."<br>";
			$strMessage .= "ลิ้งสำหรับรีเซ็ตรหัสผ่าน : ".$objResult["name"]."<br>";
			$strMessage .= "=================================<br>";
			$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader); 
	}
	mysql_close();
?>
</body>
</html>