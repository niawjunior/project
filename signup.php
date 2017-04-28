<?php
session_start();
require_once("connect.php");
require_once("config_home.php");
?>
<br><br><br>
<center>
<?php
$connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
$username1 = $_POST['username'];
$email1 = $_POST['email'];
$password1=md5(md5(md5($_POST['password2'])));
$objQuery1 = mysqli_query($connect,"SELECT * FROM member WHERE user = '".trim($_POST['username'])."' OR  email = '".trim($_POST['email'])."' ");
$objResult1 = mysqli_fetch_array($objQuery1);
if($objResult1)
{
?>
<script>
$(window).load(function()
{
$('#myModal').modal('show');
setTimeout("window.top.location.href = 'register.php';",3000);
});
</script>
<div class="container">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ชื่อผู้ใช้ หรือ อีเมลล์นี้เป็นสมาชิกอยู่แล้ว</h4>
        </div>
        <div class="modal-body">
          <p>กรุณาสมัครสมาชิกใหม่อีกครั้ง.</p>
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
$objResult=mysqli_query($connect,"INSERT INTO member (user,pass,email,status) VALUE ('$username1','$password1','$email1','USER')");
?>
<script>
$(window).load(function()
{
$('#myModal').modal('show');
setTimeout("window.top.location.href = 'home.php';",3000);
});
</script>
<div class="container">
  <!-- Trigger the modal with a button -->
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">สมัครสมาชิกเรียบร้อยแล้ว</h4>
        </div>
        <div class="modal-body">
          <p>กรุณาล็อกอินเพื่อเข้าสู่ระบบ.</p>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
</div>
<?php
}
?>
</center>
<?php
mysqli_close($connect);
?>