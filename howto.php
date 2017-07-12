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
                      <h2 class="section-heading">วิธีเข้าระบบ</h2>
                  </div>
                  <div class="col-lg-5">
                    <h4>1. กรอกชื่อ และ รหัส สมาชิกให้ถูกต้อง จากนั้นกดเข้าสู่ระบบ</h4>
                      <img src="photo/howto/3.png" alt="" width="800px">
                    </div>
                  <div class="col-md-12" style="margin-top:30px">
                      <h2 class="section-heading">วิธีสมัครสมาชิก</h2>
                  </div>
                    <div class="col-lg-5">
                    <h4>1. กดปุ่มสมัครสมาชิก</h4>
                      <img src="photo/howto/2.png" alt="" width="800px">
                      <br><br>
                    <h4>2. กรอกข้อมูลให้เรียบร้อย แล้วกดยืนยัน</h4>
                     <img src="photo/howto/4.png" alt="" width="800px">
                    </div>

                  <div class="col-md-12" style="margin-top:30px">
                      <h2 class="section-heading">รีเซ็ตรหัสผ่าน</h2>
                  </div>
                    <div class="col-lg-5">
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
    </div>
  </div>
  <br>

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