<?php
require_once("connect.php");
if (mysqli_connect_errno()) {
   ?>
   <script>
$(window).load(function()
{
$('#myModal').modal('show');
setTimeout("location.href = '/project_final';",2000);
});
</script>
<div class="container">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">มีบางอย่างผิดพลาด!</h4>
        </div>
        <div class="modal-body">
          <p>ไม่สามารถเชื่อมต่อไปยังเซิฟเวอร์ได้ กรุณาเข้าสู่ระบบอีกครั้งในภายหลัง</p>
        </div>
        <div class="modal-footer">
        </div>
      </div>
      
    </div>
  </div>
</div>
   <?php
    exit();
}

?>