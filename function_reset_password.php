<?php
require_once("config_home.php");
?>
<script src="js/validator.js"></script>
<link href="css/register.css" rel="stylesheet">
<link href="css/all.css" rel="stylesheet">
<div class="container" >
  <div class="col-md-12" >
    <div id="logbox"  >
      <form data-toggle="validator" id="signup" method="post" role="form" action="mail.php">
        <h1>ระบบรีเซ็ตรหัสผ่าน</h1>
        <div class="form-group" >
          <input name="username" type="text" class="input pass" id="inputName" placeholder="Username (ชื่อที่ใช้ล็อกอิน)" data-minlength="4" data-error="ชื่อผู้ใช้สั้นเกินไป" required>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <input name="email" type="email" class="input pass" id="inputEmail" placeholder="Email address (อีเมลที่ใช้ล็อกอิน)" data-error="คุณใส่อีเมลไม่ถูกต้อง" required>
          <div class="help-block with-errors"></div>
        </div>
        <input type="submit" value="ตกลง!" class="inputButton"/>
      </form>
    </div>
  </div>
</div>