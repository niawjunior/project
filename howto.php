<?php 
session_start();
$ID = $_SESSION["ID"];
require_once("config.php");
require_once ("connect.php");
?>
<html lang="en">
   <head>
       <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="assets/css/all.css" rel="stylesheet">
      <style>
      #container {
        min-width: 320px;
        max-width: 600px;
        margin: 0 auto;
      }
      </style>
   </head>
<body class="background">
<?php require_once( "modules/function_nav.php");?>
<div class="container box-shadow " id="main-container" style="margin-top: 50px;">
  <div class="content-section-b">
    <div class="container">
      <div class="row">
                  <div class="col-md-12" style="margin-top:30px">
                  <a href="#text1"  data-toggle="collapse"><h3 class="section-heading"><span class="glyphicon glyphicon-hand-right"></span> วิธีเข้าสู่ระบบ</h3></a>
                  </div>
                  <div id="text1" class="collapse">
                    <div class="col-lg-8">
                      <h4>กรอกชื่อ และ รหัส สมาชิกให้ถูกต้อง จากนั้นกดเข้าสู่ระบบ</h4>
                        <img src="photo/howto/3.png" alt="" width="800px">
                    </div>
                  </div>
                  <div class="col-md-12" style="margin-top:30px">
                   <a href="#text2"  data-toggle="collapse"><h3 class="section-heading"><span class="glyphicon glyphicon-hand-right"></span> วิธีสมัครสมาชิก</h3></a>
                  </div>
                   <div id="text2" class="collapse">
                      <div class="col-lg-8">
                        <h4>1. กดปุ่มสมัครสมาชิก</h4>
                          <img src="photo/howto/2.png" alt="" width="800px">
                        <h4>2. กรอกข้อมูลให้เรียบร้อย แล้วกดยืนยัน</h4>
                          <img src="photo/howto/4.png" alt="" width="800px">
                      </div>
                    </div>

                  <div class="col-md-12" style="margin-top:30px">
                   <a href="#text3"  data-toggle="collapse"><h3 class="section-heading"><span class="glyphicon glyphicon-hand-right"></span> รีเซ็ตรหัสผ่าน</h3></a>
                  </div>
                  <div id="text3" class="collapse">
                    <div class="col-lg-8">
                    <h4>1. กดปุ่มลืมรหัสผ่าน</h4>
                      <img src="photo/howto/5.png" alt="" width="800px">
                    <h4>2. กรอกชื่อหรืออีเมลล์สมาชิก เสร็จแล้วกดยืนยัน</h4>
                     <img src="photo/howto/6.png" alt="" width="800px">
                    <h4>3. ตอบคำถามส่วนตัว เสร็จแล้วกดยืนยัน</h4>
                     <img src="photo/howto/7.png" alt="" width="800px">
                    <h4>4. กำหนดรหัสผ่านใหม่ เสร็จแล้วกดยืนยัน</h4>
                     <img src="photo/howto/8.png" alt="" width="800px">
                    </div>
                  </div>
                  <div class="col-md-12" style="margin-top:30px">
                   <a href="#text4"  data-toggle="collapse"><h3 class="section-heading"><span class="glyphicon glyphicon-hand-right"></span> หน้าจัดการข้อมูลต่างๆ</h3></a>
                  </div>
                   <div id="text4" class="collapse">
                      <div class="col-lg-8" >
                          <h4>1. เมนูต่างๆ</h4>
                        <img src="photo/howto/10.png" alt="" width="800px">
                        <h4>1.1 หน้าแสดงระดับน้ำ  (Admin สามารถ ค้นหา เพิ่ม ลบ แก้ไข ข้อมูลได้)</h4>
                        <img src="photo/howto/11.png" alt="" width="800px">
                          <h4>1.2 หน้าจัดการแผนที่  (Admin สามารถ ค้นหา เพิ่ม ลบ แก้ไข ข้อมูลได้)</h4>
                        <img src="photo/howto/12.png" alt="" width="800px">
                        <h4>1.2.1 หน้าค้นหาสถานที่</h4>
                        <img src="photo/howto/13.png" alt="" width="800px">
                        <h4>1.3 หน้ากราฟแสดงระดับน้ำ  (สามารถ บันทึกเป็นไฟล์ jpg,pdf ได้)</h4>
                        <img src="photo/howto/14.png" alt="" width="800px">
                          <h4>1.4 หน้าแสดงรายงาน  (Admin สามารถ เพิ่ม ลบ แก้ไขรายงานได้)</h4>
                        <img src="photo/howto/15.png" alt="" width="800px">
                          <h4>1.5 หน้าแสดงรายชื่อสมาชิก  (Admin สามารถ ลบ แก้ไขข้อมูลสมาชิกได้)</h4>
                        <img src="photo/howto/16.png" alt="" width="800px">
                          <h4>1.6 หน้าข้อมูลส่วนตัว  (สมาชิก สามารถ แก้ไขข้อมูลส่วนตัวได้)</h4>
                        <img src="photo/howto/17.png" alt="" width="800px">
                        <h4>1.7 หน้าบันทึกการใช้งาน  (Admin สามารถ ตรวจสอบการใช้งานของสมาชิกได้)</h4>
                        <img src="photo/howto/18.png" alt="" width="800px">
                        <h4>1.8 หน้าสำหรับตั้งค่าและอื่นๆ</h4>
                        <img src="photo/howto/19.png" alt="" width="800px">
                        <h4>1.8.1 เมนูสำหรับดาวน์โหลดกิจกรรม และ บันทึกรายงานระดับน้ำ</h4>
                        <h4>1.8.2 เมนูสำหรับเปลี่ยนภาษา (TH/EN)</h4>
                        <h4>1.8.3 เมนูสำหรับสำรอง สร้าง ลบฐานข้อมูล และเช็คสถานะต่างๆของเว็บไซต์ (Admin)</h4>
                      </div>
                  </div>
      </div>
    </div>
  </div>
  <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br>

</div>
</body>
</html>
  <script>
    $('body').show();
    $('.version').text(NProgress.version);
    NProgress.start();
    setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 1000);
    NProgress.done();
  </script>