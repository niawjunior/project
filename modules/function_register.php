<?php
require_once("config.php");
?>
<script src="js/validator.js"></script>
<link href="css/register.css" rel="stylesheet">
<link href="css/all.css" rel="stylesheet">
<div class="container" >
  <div class="col-md-12" >
    <div id="logbox"  >
      <form data-toggle="validator" id="signup" method="post" role="form" action="signup.php">
        <h1>ระบบสมัครสมาชิก</h1>
        <div class="form-group" >
          <input name="username" type="text" class="input pass" id="inputName" placeholder="Username (ต้องไม่ต่ำกว่า 4 ตัวอักษร)" data-minlength="4" data-error="ชื่อผู้ใช้สั้นเกินไป" required>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <input name="email" type="email" class="input pass" id="inputEmail" placeholder="Email address (อย่าลืมใส่เครื่องหมาย @)" data-error="คุณใส่อีเมลไม่ถูกต้อง" required>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <input type="password" data-minlength="6" class="input pass" id="inputPassword" data-error="รหัสผ่านสั้นเกินไป" placeholder="Choose a password (ต้องไม่ต่ำกว่า 6 ตัวอักษร)" required>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <input name="password2" type="password" class="input pass" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="รหัสผ่านไม่ตรงกัน" placeholder="Confirm password" required>
          <div class="help-block with-errors"></div>
        </div>
        <input type="submit" value="ยืนยัน!" class="inputButton"/>
      </form>
    </div>
  </div>
</div>