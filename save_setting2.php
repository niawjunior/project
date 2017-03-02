<?php
session_start();
require_once("connect.php");
require_once("config.php");
?>
<html>
  <head>
    <center>
    <br>
    <?
    $t1 = $_POST['d1'];
    $connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
    if($t1=="D2")
    {
    $_SESSION["lang"] = "th";
    $_SESSION["strwater"] = "ระดับน้ำ";
    $_SESSION["strmap"] = "แผนที่";
    $_SESSION["strgraph"] = "กราฟ";
    $_SESSION["strreport"] = "รายงานผล";
    $_SESSION["strmember"] = "สมาชิก";
    $_SESSION["strprofile"] = "ข้อมูลส่วนตัว";
    $_SESSION["stractivity"] = "บันทึก";
    $_SESSION["strmore"] = "อื่นๆ";
    $_SESSION["strh1"] = "ตั้งค่าระบบ";
    $_SESSION["strh2"] = "เฉพาะผู้ดูและระบบเท่านั้น";
    $_SESSION["strh3"] = "วันที่/เวลา";
    $_SESSION["strh4"] = "ระบบล็อกอิน";
    $_SESSION["strh5"] = "ระบบบันทึก&รายงาน";
    $_SESSION["strh6"] = "ระบบเปลี่ยนภาษา";
    $_SESSION["strh7"] = "ระบบสำรองข้อมูล";
    $_SESSION["strh8"] = "ภาษาไทย";
    $_SESSION["strh9"] = "ภาษาอังกฤษ";
    $_SESSION["strh10"] = "บันทึกกิจกรรม";
    $_SESSION["strh11"] = "รายงานระดับน้ำ";
    $_SESSION["strh12"] = "สำรองข้อมูล";
    $_SESSION["strh13"] = "สร้าง/ลบ ฐานข้อมูล";
    $_SESSION["strh14"] = "รายละเอียด/สถานะต่างๆ";
    $_SESSION["strh15"] = "ตกลง";


    ?>
    <script>
    $(window).load(function()
    {
    $('#myModal').modal('show');
    setTimeout("location.href = 'profile.php?Action=Setting';",2000);
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
    <?
    }
    if($t1=="D3")
    {
    $_SESSION["lang"] = "en";
    $_SESSION["strwater"] = "level";
    $_SESSION["strmap"] = "map";
    $_SESSION["strgraph"] = "graph";
    $_SESSION["strreport"] = "report";
    $_SESSION["strmember"] = "member";
    $_SESSION["strprofile"] = "profile";
    $_SESSION["stractivity"] = "activity";
    $_SESSION["strmore"] = "more";
    $_SESSION["strh1"] = "Setting";
    $_SESSION["strh2"] = "Admin Only";
    $_SESSION["strh3"] = "Date/Time";
    $_SESSION["strh4"] = "Login System";
    $_SESSION["strh5"] = "Report System";
    $_SESSION["strh6"] = "Language System";
    $_SESSION["strh7"] = "Backup System";
    $_SESSION["strh8"] = "thai";
    $_SESSION["strh9"] = "english";
    $_SESSION["strh10"] = "activity";
    $_SESSION["strh11"] = "report";
    $_SESSION["strh12"] = "backup data";
    $_SESSION["strh13"] = "create/delete database";
    $_SESSION["strh14"] = "detail/status";
    $_SESSION["strh15"] = "ok";
    ?>
    <script>
    $(window).load(function()
    {
    $('#myModal').modal('show');
    setTimeout("location.href = 'profile.php?Action=Setting';",2000);
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
              <h4 class="modal-title">เปลี่ยนระบบเป็นภาษาอังกฤษเรียบร้อยแล้ว</h4>
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
    <?
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
    <?
    mysqli_close($connect);
    }
    ?>
    </center>
  </head>
</html>