<html>
<body>
<?php
	session_start();
	$username = $_POST['username'];
	$message = $_POST['message'];
	?>
		<?
			$strTo = $_POST['email'];
			$strSubject = "Mail to Admin";
			$strHeader = "Content-type: text/html; charset=windows-874\n"; // or UTF-8 //
			$strHeader .= "From: USER\nReply-To: niawkung2@gmail.com";
			$strMessage = "";
			$strMessage .= $message."<br>";
			$strMessage .= "=================================<br>";
			$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader); 
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