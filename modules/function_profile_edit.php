<div class="col-md-3" align="center">
            <img class="img-rounded" width="200" height="auto"  alt="User Pic" src="<?=$f8?>">
</div>
<div class=" col-md-9">
<table class="table table-user-information">
    <tbody>
              <tr>
                  <div class="form-group">
                    <td><label><strong>ชื่อที่ใช้ล็อกอิน</strong></label></td>
                    <td><input class="form-control" disabled type="text" style="text-align:center;" name="txtuser"  value="<?=$f1?>" required></td>
                  </div>
                </tr>
                <tr>
                  <div class="form-group">
                    <td><label><strong>ชื่อ-นามสกุล</strong></label></td>
                    <td><input class="form-control" type="text" style="text-align:center;" name="txtname"  value="<?=$f3?>" placeholder="ชื่อจริง *"  required></td>
                  </div>
                </tr>
             <!--<tr>
                  <div class="form-group" >
                     <td><label><strong>รูปประจำตัว</strong></label></td>
                   <td>
                     <input type="file" name="txtphoto" class="filestyle" data-icon="true">
             		</td>

             		</div>
             </tr> -->
              <tr>
                  <div class="form-group">
                    <td><label><strong>รูปประจำตัว</strong></label></td>
                    <td><input class="form-control" type="text" style="text-align:center;" name="txtphoto"  placeholder="ตัวอย่าง url : www.photo/img.png"></td>
                  </div>
                </tr>

             <tr>
                  <div class="form-group">
                    <td><label><strong>อีเมล</strong></label></td>
                    <td><input class="form-control" type="text" style="text-align:center;" id="inputEmail" name="txtemail"  value="<?=$f4?>" placeholder="Email address (อย่าลืมใส่เครื่องหมาย @) *" data-error="คุณใส่อีเมลไม่ถูกต้อง" required></td>
                    <div class="help-block with-errors"></div>
                  </div>
                </tr>


                <tr>
                  <div class="form-group">
                    <td><label><strong>เบอร์โทร</strong></label></td>
                    <td><input class="form-control" type="text" style="text-align:center;" name="txttel"  value="<?=$f6?>" placeholder="เบอร์โทร ที่สามารถติดต่อได้ *" required></td>
                  </div>
                </tr>


                 <tr>
                  <div class="form-group" >
                    <td><label><strong>เพศ</strong></label></td>
                    <td>
                      <select name="txtsex" class="form-control" style="text-align-last:center;">
                        <option value="ชาย" >ชาย</option>
                        <option value="หญิง">หญิง</option>
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
                <td><a name="btnAdd" class="btn btn-warning" type="button" id="btnCancel" OnClick="window.location='<?=$_SERVER["PHP_SELF"];?>';">ยกเลิก <span class="glyphicon glyphicon-remove"></span></a>  
                </td>
                <button  class="btn btn-success" type="button" value="บันทึกข้อมูล" data-toggle="modal" data-target="#loginModal"/>บันทึกข้อมูล 
                <span class="glyphicon glyphicon-ok"></span>
                </button>
</div>