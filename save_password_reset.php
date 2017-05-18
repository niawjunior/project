<?php
	require_once("connect.php");
	require_once("config.php");
	$password = md5(md5(md5($_POST['inputPasswordConfirm'])));
	$user_email = $_POST['USER_EMAIL'];
	$connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
 	$strSQL = mysqli_query($connect,"UPDATE member SET pass = '$password' WHERE user = '$user_email'  OR email = '$user_email'");
	if($strSQL)
	{
		?>
<script>
$(window).load(function()
{
$('#myModal').modal('show');
setTimeout("top.location.href = 'home.php';",2500);
});
</script>
<div class="container">
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">ระบบแจ้งเตือน!</h4>
				</div>
				<div class="modal-body">
					<p>บันทึกข้อมูลเรียบร้อยแล้ว กรุณาล็อกอินเพื่อเข้าสู่ระบบอีกครั้ง.</p>
				</div>
			</div>
		</div>
	</div>
</div>
	<?php
	}
?>
