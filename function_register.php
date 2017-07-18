<?php
require_once("config.php");
?>
<link href="assets/css/register.css" rel="stylesheet">
<link href="assets/css/all.css" rel="stylesheet">
<div class="container" >
  <div class="col-md-12" >
    <div id="logbox"  >
      <form id="signup" method="post" role="form" action="signup.php">
        <h1>ระบบสมัครสมาชิก</h1>
        <div class="form-group" align="center">
          <input name="username" type="text" class="input pass" id="inputName" placeholder="Username (ต้องไม่ต่ำกว่า 4 ตัวอักษร)" minlength="4" required>
        </div>
        <div class="form-group" align="center">
          <input name="email" type="email" class="input pass" id="inputEmail" placeholder="Email address (อย่าลืมใส่เครื่องหมาย @)"  required>
        </div>
        <div class="form-group" align="center">
          <input type="password" minlength="6" class="input pass" id="inputPassword" data-error="รหัสผ่านสั้นเกินไป" placeholder="Choose a password (ต้องไม่ต่ำกว่า 6 ตัวอักษร)" required>
        </div>
        <div class="form-group" align="center">
          <input name="password2" type="password" class="input pass" id="inputPasswordConfirm" placeholder="Confirm password" >
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
          <input name="answer" type="text" class="input pass" id="answer" placeholder="Answer"  required>
        </div>
        <input type="submit" value="ยืนยัน!" class="inputButton"/>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript">
window.onload = function () {
  document.getElementById("inputPassword").onchange = validatePassword;
  document.getElementById("inputPasswordConfirm").onchange = validatePassword;
}
function validatePassword(){
var pass1=document.getElementById("inputPassword").value;
var pass2=document.getElementById("inputPasswordConfirm").value;
if(pass1!=pass2)
  document.getElementById("inputPasswordConfirm").setCustomValidity("รหัสผ่านที่กรอกไม่ตรงกัน");
else
  document.getElementById("inputPasswordConfirm").setCustomValidity('');  
}
</script>