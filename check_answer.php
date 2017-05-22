<?php
	require_once("connect.php");
	require_once("config.php");
	$connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
	$user_email = $_POST['user_email'];
	$strSQL = mysqli_query($connect,"SELECT * FROM member WHERE (user = '$user_email' or email = '$user_email')");
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
					<p>ชื่อผู้ใช้นี้ยังไม่มีอยู่ในระบบ.</p>
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
      <form  id="pass_reset" method="post" role="form" action="new_password.php">
        <h1>กรุณาตอบคำถาม</h1>
        <div class="form-group" align="center">
				<label class="control-label"><h3 style="color : red;">(<?php echo $objResult['question'];?>)</h3></label>
        </div>
          <div class="form-group" align="center">
          <input name="answer" type="text" class="input pass" id="answer" placeholder="Answer" required>
					<input name="user_email" type="hidden" class="input pass" id="user_email" value="<?php echo $user_email;?>">
        </div>
        <input type="submit" value="ยืนยันการทำรายการ" class="inputButton"/>
      </form>
    </div>
  </div>
<?php
}
?>