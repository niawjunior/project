<?php
session_start();
require_once("connect.php");
require_once("config.php");
?>
<html>
  <head>
    <center>
    <br>
    <?php
    $t1 = $_POST['d1'];
    $connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
    if($t1=="D2")
    {
      $_SESSION["lang"] = "th";
      ?>
      <script>
      $(window).load(function()
      {
      $('#myModal').modal('show');
      setTimeout("location.href = 'profile.php?Action=Setting';",2000);
      });
      </script>
      <div class="container">
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">เปลี่ยนระบบเป็นภาษาไทยเรียบร้อยแล้ว</h4>
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
    if($t1=="D3")
    {
    $_SESSION["lang"] = "en";
    ?>
    <script>
    $(window).load(function()
    {
    $('#myModal').modal('show');
    setTimeout("location.href = 'profile.php?Action=Setting';",2000);
    });
    </script>
    <div class="container">
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Change the system to English successfully.</h4>
            </div>
            <div class="modal-body">
              <p>please wait..</p>
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    }
    if($t1=="")
    {
      ?>
      <script>
      $(window).load(function()
      {
      $('#myModal').modal('show');
      setTimeout("location.href = 'profile.php?Action=Setting';",3000);
      });
      </script>
      <div class="container">
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">กรุณาเลือกรายการก่อนกดปุ่มตกลง</h4>
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
      mysqli_close($connect);
    }
    ?>
    </center>
  </head>
</html>