<?php
require_once("config.php");
?>
<script src="assets/js/validator.js"></script>
<link href="assets/css/register.css" rel="stylesheet">
<link href="assets/css/all.css" rel="stylesheet">
<div class="container" >
  <div class="col-md-12" >
    <div id="logbox"  >
      <form  id="pass_reset" method="post" role="form" action="check_password_reset.php">
        <h1>รีเซ็ตรหัสผ่าน</h1>

        <div class="form-group" align="center">
          <input name="user_email" type="text" class="input pass" id="inputEmail" placeholder="Username Or Email" required>
        </div>
        <div class="form-group" align="center">
        <select name="question" id="question" class="selectpicker" data-width="320px"  required>
        <option></option>
        <option>สัตย์เลี้ยงตัวแรกของคุณชื่อว่า?</option>
        <option>ครูประถมที่คุณชื่นชอบ?</option>
        <option>งานอดิเรกของคุณคือ?</option>
        <option>คุณเกิดที่จังหวัด?</option>
        </select>
        </div>
          <div class="form-group" align="center">
          <input name="answer" type="text" class="input pass" id="answer" placeholder="Answer" required>
        </div>
        <input type="submit" value="ยืนยัน!" class="inputButton"/>
      </form>
    </div>
  </div>
</div>