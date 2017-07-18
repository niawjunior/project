<?php
require_once("connect.php");
require_once("config.php");
?>
<html>
  <head>
    <center>
    <br>
    <?php
    $t1 = $_POST['date_range'];
    if($t1=='day'){
        $DATE_RANGE = 1;
    }
    if($t1=='week'){
        $DATE_RANGE = 7;
    }
    if($t1=='month'){
        $DATE_RANGE = 30;
    }
    if($t1=='year'){
        $DATE_RANGE = 365;
    }
    $CURRENT_DATE = date("Y-m-d");
    $START_DATE = date("Y-m-d", strtotime("-$DATE_RANGE day", strtotime($date)));

    $connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
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
                <h4 class="modal-title">กรุณาเลือกกรอกข้อมูลก่อนกดปุ่มตกลง</h4>
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
    }else{
      $check = mysqli_query($connect,"DELETE FROM water_table WHERE date BETWEEN '$START_DATE' AND '$CURRENT_DATE' ");
        if($check){
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
                <h4 class="modal-title">ลบข้อมูลเสร็จเรียบร้อยแล้ว</h4>
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
    }
    ?>
    </center>
  </head>
</html>