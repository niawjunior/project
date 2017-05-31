<div class="col-md-3" align="center">
            <img class="img-rounded" width="200" height="auto"  alt="User Pic" src="<?php echo $f8?>">
</div>
<div class=" col-md-9">
<table class="table table-user-information">
    <tbody>
          <tr>
              <div class="form-group">
                <td><label><strong>ชื่อที่ใช้ล็อกอิน </strong></label></td>
                <td><input class="form-control" disabled type="text" style="text-align:center;" name="txtuser"  value="<?php echo $f1?>" required></td>
              </div>
          </tr>
          <tr>
              <div class="form-group">
                <td><label><strong>ชื่อ-นามสกุล</strong></label></td>
                <td><input autofocus="autofocus" class="form-control" type="text" style="text-align:center;" name="txtname"  value="<?php echo $f3?>" placeholder="ชื่อจริง "></td>
              </div>
            </tr>
          <tr>
              <div class="form-group">
                <td><label><strong>รูปประจำตัว</strong></label></td>
                <td><input class="form-control" type="text" style="text-align:center;" name="txtphoto"  placeholder="ตัวอย่าง url : www.photo/img.png"></td>
              </div>
          </tr>
          <tr>
              <div class="form-group">
                <td><label><strong>อีเมล</strong></label></td>
                <td><input class="form-control" type="text" style="text-align:center;" id="inputEmail" name="txtemail"  value="<?php echo $f4?>" placeholder="Email address (อย่าลืมใส่เครื่องหมาย @) *" data-error="คุณใส่อีเมลไม่ถูกต้อง" required></td>
                <div class="help-block with-errors"></div>
              </div>
          </tr>
          <tr>
              <div class="form-group">
                <td><label><strong>เบอร์โทร</strong></label></td>
                <td><input class="form-control" type="text" style="text-align:center;" name="txttel"  value="<?php echo $f6?>" placeholder="เบอร์โทร ที่สามารถติดต่อได้ " ></td>
              </div>
          </tr>
          <tr>
              <div class="form-group" >
                <td><label><strong>เพศ</strong></label></td>
                <td>
                  <select name="txtsex" class="form-control" style="text-align-last:center;">
                    <?php if($f5=='ชาย')
                      {
                        ?>
                        <option value="ชาย">ชาย</option>
                        <option value="หญิง">หญิง</option>
                        <?php
                      }
                      else
                      {
                        ?>
                        <option value="หญิง">หญิง</option>
                        <option value="ชาย">ชาย</option>
                        <?php
                      }
                  ?>
                  </select>
                </td>
              </div>
          </tr>
          <tr>
              <div class="form-group">
                <td><label><strong>สถานะ</strong></label></td>
                <td>
                  <select name="txtstatus" style="text-align-last:center;" class="form-control" disabled="">
                    <option value="ADMIN">ADMIN</option>
                    <option value="USER">USER</option>
                  </select>
                </td>
              </div>
          </tr>
          <tr>
              <div class="form-group">
                <td><label><strong>รหัสผ่านใหม่</strong></label></td>
                <td><input type="password" data-minlength="6" style="text-align:center;" class="form-control" id="inputPassword" data-error="รหัสผ่านสั้นเกินไป" placeholder="Choose a password (ต้องไม่ต่ำกว่า 6 ตัวอักษร)" ></td>
                <div class="help-block with-errors"></div>
              </div>
          </tr>
          <tr>
              <div class="form-group">
                <td><label><strong>ยืนยันรหัสผ่านอีกครั้ง</strong></label></td>
                <td><input type="password" style="text-align:center;" class="form-control" id="inputPasswordConfirm" name ="inputPasswordConfirm" data-match="#inputPassword" data-match-error="รหัสผ่านไม่ตรงกัน" placeholder="Confirm password (ยืนยันรหัสผ่าน)" ></td>
                <div class="help-block with-errors"></div>
              </div>
          </tr>
    </tbody>
</table>
                <button class="btn btn-success" type="button" value="บันทึกข้อมูล" data-toggle="modal" data-target="#loginModal" data-toggle="tooltip" title="บันทึกข้อมูล">บันทึกข้อมูล 
                <span class="glyphicon glyphicon-ok-sign"></span>
                </button>
                <button data-toggle="tooltip" title="ยกเลิก" name="btnAdd" class="btn btn-warning" type="button" id="btnCancel" OnClick="window.location='<?php echo $_SERVER["PHP_SELF"];?>';">ยกเลิก <span class="glyphicon glyphicon-share-alt"></span></button>  
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