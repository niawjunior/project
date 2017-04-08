<?php
require_once("connect.php");
require_once("config.php");
?>
<html>
  <head>
    <center>
    <br>
    <?php
    $t1 = $_POST['b1'];
    $connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
    if($t1=="B2")
    {
    header( "location: /project_final/pdf/index.php" );
    exit(0);
    }
    if($t1=="B3")
    {
    header( "location: /project_final/pdf/index1.php" );
    exit(0);
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
      <!-- Trigger the modal with a button -->
      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
          
          <!-- Modal content-->
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