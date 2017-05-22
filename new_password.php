<?php
	require_once("connect.php");
	require_once("config.php");
	$answer = $_POST['answer'];
	$user_email = $_POST['user_email'];
	$connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
 	$strSQL = mysqli_query($connect,"SELECT * FROM member WHERE (user = '$user_email' or email = '$user_email') and answer = '$answer'");
	$objResult = mysqli_fetch_array($strSQL);
	if(!$objResult)
	{
		?>
<script>
$(window).load(function()
{
$('#myModal').modal('show');
setTimeout("top.location.href = 'reset_pass.php';",2500);
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
					<p>คุณตอบคำถามไม่ถูกต้อง.</p>
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
<link href="assets/css/register.css" rel="stylesheet">
<link href="assets/css/all.css" rel="stylesheet">
<div class="container" >
  <div class="col-md-12" >
    <div id="logbox"  >
      <form  id="pass_reset" method="post" role="form" action="save_password_reset.php">
        <h1>เปลี่ยนรหัสผ่าน</h1>

         <div class="form-group" align="center">
          <input type="password" data-minlength="6" class="input pass" name="inputPassword" id="inputPassword"  placeholder="Choose a password (ต้องไม่ต่ำกว่า 6 ตัวอักษร)" required>
        </div>
        <div class="form-group" align="center">
          <input name="inputPasswordConfirm" type="password" class="input pass" id="inputPasswordConfirm"  placeholder="Confirm password" >
          <input name="USER_EMAIL" type="hidden" class="input pass" id="USER_EMAIL" value="<?php echo $user_email; ?>">
        </div>
        <input type="submit" name="change_password" id="change_pass" value="ยืนยันการทำรายการ" class="inputButton"/>
      </form>
    </div>
  </div>
</div>
	 <?php
 }
	?>
	
<script type="text/javascript">
window.onload = function () {
  document.getElementById("inputPassword").onchange = validatePassword;
  document.getElementById("inputPasswordConfirm").onchange = validatePassword;
}
function validatePassword(){
var pass1=document.getElementById("inputPassword").value;
var pass2=document.getElementById("inputPasswordConfirm").value;
if(pass1!=pass2)
  document.getElementById("inputPasswordConfirm").setCustomValidity("รหัสผ่านที่กรอกไม่ตรงกัน");
else
  document.getElementById("inputPasswordConfirm").setCustomValidity('');  
}
</script>