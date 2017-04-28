<?php 
include "config.php";
$host = $_POST['host_delete'];
$user = $_POST['user_delete'];
$pass = $_POST['password_delete'];
$db = $_POST['database_delete'];
error_reporting(E_ERROR | E_PARSE);
$connect = mysqli_connect($host,$user,$pass,$db);
if(!$connect)
{
?>
<script>
$(window).load(function()
{
$('#myModal').modal('show');
setTimeout("location.href = 'create_database.php';",3000);
});
</script>
<div class="container">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">เชื่อมต่อฐานข้อมูลไม่สำเร็จ ชื่อหรือรหัสผ่านไม่ถูกต้อง</h4>
        </div>
        <div class="modal-body">
          <p>กรุณารอสักครู่..</p>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
</div>
<?php 
}
$sql = "drop database $db";
if(mysqli_query($connect, $sql)){
?>
<script>
$(window).load(function()
{
$('#myModal').modal('show');
setTimeout("location.href = 'create_database.php';",3000);
});
</script>
<div class="container">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ลบฐานข้อมูล<?php echo $db?>ข้อมูลเรียบร้อยแล้ว</h4>
        </div>
        <div class="modal-body">
          <p>กรุณารอสักครู่..</p>
        </div>
        <div class="modal-footer">
        </div>
      </div>
      
    </div>
  </div>
</div>
<?php 
}
mysqli_close($connect);
?>