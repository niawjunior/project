<?php
require_once("config.php");
?>
<script src="assets/js/validator.js"></script>
<link href="assets/css/register.css" rel="stylesheet">
<link href="assets/css/all.css" rel="stylesheet">
<div class="container" >
  <div class="col-md-12" >
    <div id="logbox"  >
      <form  id="pass_reset" method="post" role="form" action="check_answer.php">
        <h1>ระบบรีเซ็ตรหัสผ่าน</h1>

        <div class="form-group" align="center">
          <input name="user_email" type="text" class="input pass" id="inputEmail" placeholder="Username Or Email" required>
        </div>
        
        <input type="submit" value="ยืนยันการทำรายการ" class="inputButton"/>
      </form>
    </div>
  </div>
</div>

