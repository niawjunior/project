<?php
session_start();
require_once("config_home.php");
require_once("connect.php");
$POST = $_SESSION["USER"];
date_default_timezone_set('Asia/Bangkok');
$date = date("d-m-Y");
$time = date("H:i:s");
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <br>
  <script>
    $(document).ready( function () {
      $('#bootstrap-table').bdt();
    });
  </script>
  <script>
    $(document).ready( function () {
      $('#bootstrap-table').bdt({
        showSearchForm: 2,
        showEntriesPerPageField: 0
      });
    });
  </script>
</head>
<body>
  <?
  $connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
  if($_POST["hdnCmd"] == "Add")
  {
    $password1=md5(md5(md5($_POST['txtAddpass'])));
    $objQuery = mysqli_query($connect, "INSERT INTO member (user,pass,name,email,sex,tel,status) values  ('".$_POST["txtAdduser"]."','$password1','".$_POST["txtAddname"]."','".$_POST["txtAddemail"]."','".$_POST["SEX"]."','".$_POST["txtAddtel"]."','".$_POST["STATUS"]."')");
    mysqli_query($connect,"INSERT INTO activity (user,time,date,atvt,note) VALUES  ('$POST','$time',' $date','เพิ่มสมาชิก',' เพิ่มข้อมูล | ชื่อ ".$_POST["txtAdduser"]."') ");
    mysqli_query($connect,"UPDATE member SET lastactivity = 'เพิ่มสมาชิก | ชื่อ ".$_POST["txtAdduser"]."'  where user = '$POST'");
    mysqli_query($connect,"UPDATE member SET countatvt = countatvt+1 where user = '$POST'");
  }
  if($_POST["hdnCmd"] == "Update")
  {
    $objQuery = mysqli_query($connect, "SELECT * FROM member WHERE ID = '".$_POST["txtID"]."' ");
    while($objResult = mysqli_fetch_array($objQuery))
    {
      $f0 = $objResult['ID'];
      $f1 = $objResult['user'];
    }
    $objQuery = mysqli_query($connect, "UPDATE member SET name = '".$_POST["txtname"]."',email = '".$_POST["txtemail"]."',sex = '".$_POST["SEX_EDIT"]."',tel = '".$_POST["txttel"]."',status = '".$_POST["STATUS_EDIT"]."' WHERE ID = '".$_POST["txtID"]."' ");
    mysqli_query($connect,"INSERT INTO activity (user,time,date,atvt,note) VALUES  ('$POST','$time',' $date','แก้ไขสมาชิก',' แก้ไขข้อมูล | ชื่อ  $f1 | ไอดี   ".$_POST["txtID"]."') ");
    mysqli_query($connect,"UPDATE member SET lastactivity = 'แก้ไขสมาชิก | ชื่อ $f1'  where user = '$POST'");
    mysqli_query($connect,"UPDATE member SET countatvt = countatvt+1 where user = '$POST'");
  }
  if($_GET["Action"] == "Del")
  {
    $objQuery = mysqli_query($connect, "SELECT * FROM member WHERE ID = '".$_GET["ID"]."' ");
    while($objResult = mysqli_fetch_array($objQuery))
    {
      $f0 = $objResult['ID'];
      $f1 = $objResult['user'];
    }
    mysqli_query($connect,"INSERT INTO activity (user,time,date,atvt,note) VALUES  ('$POST','$time',' $date','ลบสมาชิก',' ลบข้อมูล | ชื่อ  $f1 | ไอดี $f0') ");
    mysqli_query($connect,"UPDATE member SET lastactivity = 'ลบสมาชิก | ชื่อ $f1'  where user = '$POST'");
    mysqli_query($connect,"UPDATE member SET countatvt = countatvt+1 where user = '$POST'");
    $objQuery = mysqli_query($connect, "DELETE FROM member WHERE ID = '".$_GET["ID"]."' ");
  }
  $objQuery1 = mysqli_query($connect, "SELECT * FROM member ");
  $objQuery = mysqli_query($connect, "SELECT * FROM member ORDER BY ID DESC ");
  ?>
  <form name="frmMain" method="post" action="<?=$_SERVER["PHP_SELF"];?>">
    <input type="hidden" name="hdnCmd" value="">
    <table class="table table-hover  "  border="0" id="bootstrap-table">
      <tr>
        <thead class="thead-inverse">
          <th class="default" width="15%" height="50"> <div align="center"><strong>ชื่อสมาชิก</strong></div></th>
          <th class="default" width="8%" height="50"> <div align="center"><strong>รหัสผ่าน</strong></div></th> 
          <th class="default" width="15%" height="50"> <div align="center"><strong>ชื่อจริง</strong></div></th>
          <th class="default" width="20%" height="50"> <div align="center"><strong>อีเมล</strong></div></th>
          <th class="default" width="10%" height="50"> <div align="center"><strong>เพศ</strong></div></th>
          <th class="default" width="10%" height="50"> <div align="center"><strong>เบอร์โทร</strong></div></th>
          <th class="default" width="11%" height="50"> <div align="center"><strong>รูปประจำตัว</strong></div></th>
          <th class="default" width="10%" height="50"> <div align="center"><strong>สถานะ</strong></div></th>
          <th class="default" width="20%" height="50"> <div align="center"><strong>แก้ไข</strong></div></th>
          <th class="default" width="20%" height="50"> <div align="center"><strong>ลบ</strong></div></th>
        </tr>
      </thead>
      <?
      while($objResult = mysqli_fetch_array($objQuery))
      {
        $f0 = $objResult['ID'];
        $f1 = $objResult['user'];
        $f2 = $objResult['pass'];
        $f3 = $objResult['name'];
        $f4 = $objResult['email'];
        $f5 = $objResult['sex'];
        $f6 = $objResult['tel'];
        $f7 = $objResult['status'];
        $f8 = $objResult['img']

        ?>
        <?

          if($f8 == "")
          {
            $logoprofile = 'photo/user.png';
          }
          else
          {
            $logoprofile = $f8;
          }
        if($objResult["ID"] == $_GET["ID"] and $_GET["Action"] == "Edit")
        {
          ?>
          <tr>
            <td><center><input disabled class="form-control" type="text" style="text-align:center;" name="txtuser"  value="<?=$f1?>"></center></td>
            <td><center><input disabled class="form-control" type="password" style="text-align:center;" name="txtpass"  value="<?=$f2?>"></center></td>
            <td><center><input class="form-control" type="text" style="text-align:center;" name="txtname"  value="<?=$f3?>"></center></td>
            <td><center><input class="form-control" type="text" style="text-align:center;" name="txtemail"   value="<?=$f4?>"></center></td>
            <td>
              <select name="SEX_EDIT" class="form-control" >
                <option value="ชาย">ชาย</option>
                <option value="หญิง">หญิง</option>
              </select>
            </td>
            <td><center><input class="form-control" type="text" style="text-align:center;" name="txttel"   value="<?=$f6?>"></center></td>
                           <td><center><img src="<?php echo $logoprofile ?>" class="img-circle " height ="35" width="auto" ></center></td>
            <td>
              <select name="STATUS_EDIT" class="form-control" >
                <option value="USER">USER</option>
                <option value="ADMIN">ADMIN</option>
                <option value="BAN">BAN</option>
              </select>
            </td>
            <td><center><input name="btnAdd" class="btn btn-default" type="button" id="btnUpdate" value="บันทึก" OnClick="frmMain.hdnCmd.value='Update';frmMain.submit();"></td></center>
            <td><center><input name="btnAdd" class="btn btn-default" type="button" id="btnCancel" value="ยกเลิก" OnClick="window.location='<?=$_SERVER["PHP_SELF"];?>?Page=<?=$Page?>';"></td></center>
            <tr><input name="txtID" size="0" type="hidden" id="txtID" value="<?=$f0?>"></tr>
          </tr>
          <?
        }
        else
        {

          ?>
          <tr>
            <td ><center><?php echo $f1 ?></center></td>
            <td><center><?php echo substr($f2, 0, 5); ?></center></td>
            <td><center><?php echo $f3?></center></td>
            <td><center><?php echo $f4 ?></center></td>
            <td><center><?php echo $f5 ?></center></td>
            <td><center><?php echo substr($f6,0,7).'xxx' ?></center></td>
            <td><center><img src="<?php echo $logoprofile ?>" class="img-circle " height ="35" width="auto" ></center></td>
            <td><center><?php echo $f7 ?></center></td>
            <td align="center"><a href="JavaScript:if(confirm('ต้องการจะแก้ไขหรือไม่?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Page=<?=$Page?>&Action=Edit&ID=<?=$f0?>';}"> <span class="glyphicon glyphicon-edit"></span></a></td>
            <td align="center"><a href="JavaScript:if(confirm('ต้องการจะลบหรือไม่?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Page=<?=$Page?>&Action=Del&ID=<?=$f0?>';}"> <span class="glyphicon glyphicon-trash"></span></a></td>
          </tr>
          <?
        }
        ?>
        <?
      }
      ?>
      <!-- <tr>
        <td><center><input class="form-control" type="text" style="text-align:center;" name="txtAdduser" ></center></td>
        <td><center><input class="form-control" type="text" style="text-align:center;" name="txtAddpass" ></center></td>
        <td><center><input class="form-control" type="text" style="text-align:center;" name="txtAddname" ></center></td>
        <td><center><input class="form-control" type="text" style="text-align:center;" name="txtAddemail"  ></center></td>
        <td>
          <select name="SEX"class="form-control" >
            <option value="ชาย">ชาย</option>
            <option value="หญิง">หญิง</option>
          </select>
        </td>
        <td><center><input class="form-control" type="text" style="text-align:center;" name="txtAddtel"  ></center></td>
        <td><center><label class="btn btn-default btn-file">
          รูปภาพ <input type="file" name="fileupload" id="fileupload" style="display: none;">
        </label></center></td>
        <td>
          <select name="STATUS" class="form-control">
            <option value="USER">USER</option>
            <option value="ADMIN">ADMIN</option>
          </select>
        </td>
        <td><center><input name="btnAdd" class="btn btn-default" type="button" id="btnAdd" width="20%" value="บันทึก" OnClick="frmMain.hdnCmd.value='Add';frmMain.submit();"></td>
        <td><center><input type = "reset" class="btn btn-default" width="20%" value="เคลียร์"></td>
      </tr> -->
    </table>
  </form>
  <?
  mysqli_close($connect);
  ?>
</body>
</html>