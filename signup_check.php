<?php
session_start();
require_once("config.php");
?>
<?php
if($_GET['Success']=='TRUE')
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
  <?
}
?>

<?php
if($_GET['Success']=='FALSE')
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
?>