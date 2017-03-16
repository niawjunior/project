<html>
<body>
<?php
	session_start();
	$username = $_POST['username'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	?>
			<?php	
			$strTo = $email;
			$strSubject = "แจ้งปัญหา/ติดต่อผู้ดูแลระบบ";
			$strHeader = "Content-type: text/html; charset=windows-874\n"; // or UTF-8 //
		    $strHeader .= "From: "."$email";
			$strMessage = "";
			$strMessage .= "ข้อความจากคุณ : ".$username."<br>";
			$strMessage $message;
			$strMessage .= "=================================<br>";
			$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader); 
			mysql_close();
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
		          <h4 class="modal-title">ทำรายการสำเร็จ</h4>
		        </div>
		        <div class="modal-body">
		          <p>ข้อความถูกส่งไปทางอีเมลเรียบร้อยแล้ว.</p>
		        </div>
		        <div class="modal-footer">
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
</body>
</html>