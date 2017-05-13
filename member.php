<?php
session_start();
require_once("config.php");
require_once("connect.php");
if($_SESSION["STATUS"]=='')
  {
  header('Location: 404.php');
  exit();
  }
$POST = $_SESSION["USER"];
date_default_timezone_set('Asia/Bangkok');
$date = date("d-m-Y");
$time = date("H:i:s");
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <?php 
  $connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
  if(isset($_POST['btnUpdate']))
  {
    $objQuery = mysqli_query($connect, "SELECT * FROM member WHERE ID = '".$_POST["txtID"]."' ");
    while($objResult = mysqli_fetch_array($objQuery))
    {
      $f0 = $objResult['ID'];
      $f1 = $objResult['user'];
    }
    $objQuery = mysqli_query($connect, "UPDATE member SET name = '".$_POST["txtname"]."',email = '".$_POST["txtemail"]."',sex = '".$_POST["SEX_EDIT"]."',tel = '".$_POST["txttel"]."' WHERE ID = '".$_POST["txtID"]."' ");
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
  <form name="frmMain" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    <input type="hidden" name="hdnCmd" value="">
    <table class="table table-hover  "  border="0" id="bootstrap-table">
      <tr>
        <thead class="thead-inverse">
          <th class="default" width="10%" height="50"> <div align="center"><strong>ชื่อสมาชิก</strong></div></th>
          <th class="default" width="16%" height="50"> <div align="center"><strong>ชื่อจริง</strong></div></th>
          <th class="default" width="15%" height="50"> <div align="center"><strong>อีเมล</strong></div></th>
          <th class="default" width="10%" height="50"> <div align="center"><strong>เพศ</strong></div></th>
          <th class="default" width="10%" height="50"> <div align="center"><strong>เบอร์โทร</strong></div></th>
          <th class="default" width="10%" height="50"> <div align="center"><strong>รูปประจำตัว</strong></div></th>
          <th class="default" width="10%" height="50"> <div align="center"><strong>สถานะ</strong></div></th>
              <?php if($_SESSION["status"] == 'ADMIN')
    {
        ?>
          <th class="default" width="10%" height="50"> <div align="center"><strong>แก้ไข</strong></div></th>
          <th class="default" width="25%" height="50"> <div align="center"><strong>ลบ</strong></div></th>
      
        <?php
    }
    ?>
        </tr>
      </thead>
      <?php 
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
        <?php
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
            <td><center><input disabled class="form-control" type="text" style="text-align:center;" name="txtuser"  value="<?php echo $f1?>"></center></td>
            <td><center><input autofocus="autofocus" class="form-control" type="text" style="text-align:center;" name="txtname"  value="<?php echo $f3?>" ></center></td>
            <td><center><input class="form-control" type="text" style="text-align:center;" name="txtemail"   value="<?php echo $f4?>" required></center></td>
            <td>
              <select name="SEX_EDIT" class="form-control" >
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
            <td><center><input class="form-control" maxlength="10" type="text" style="text-align:center;" name="txttel"   value="<?php echo substr($f6,0,6).'xxx' ?>" required></center></td>
                           <td><center><img src="<?php echo $logoprofile ?>" class="img-circle " height ="35" width="auto" ></center></td>
             <td><center><input disabled class="form-control" type="text" style="text-align:center;"  value="<?php echo $f7?>"></center></td>
            <td><center><button   data-toggle="tooltip" title="บันทึกข้อมูล" name="btnUpdate" class="btn btn-success" id="btnUpdate" value="">บันทึก <span class="glyphicon glyphicon-ok-sign"></span></button></center></td>
            <td><center><button data-toggle="tooltip" title="ยกเลิก" name="btnAdd" class="btn btn-warning" id="btnCancel" value="" OnClick="window.location='<?php echo $_SERVER["PHP_SELF"];?>?Page=<?php echo $Page?>';">ยกเลิก <span class="glyphicon glyphicon-share-alt"></span></button></center></td>
            <tr><input name="txtID" size="0" type="hidden" id="txtID" value="<?php echo $f0?>"></tr>
          </tr>
          <?php 
        }
        else
        {
          ?>
          <tr>
            <td ><center><?php echo $f1 ?></center></td>
            <td><center><?php if($f3==''){echo 'ไม่ระบุ';}else{echo $f3;} ?></center></td>
            <td><center><?php echo $f4 ?></center></td>
            <td><center><?php if($f5==''){echo 'ไม่ระบุ';}else{echo $f5;} ?></center></td>
            <td><center><?php if($f6==''){echo 'ไม่ระบุ';}else{echo $f6;} ?></center></td>
            <td><center><img src="<?php echo $logoprofile ?>" class="img-circle " height ="35" width="auto" ></center></td>
            <td><center><?php echo $f7 ?></center></td>
             <?php if($_SESSION["status"] == 'ADMIN')
    {
        ?>
            <td align="center"><a data-toggle="tooltip" title="แก้ไขข้อมูล" href="JavaScript:if(confirm('ต้องการจะแก้ไขหรือไม่?')==true){window.location='<?php echo $_SERVER["PHP_SELF"];?>?Page=<?php echo $Page?>&Action=Edit&ID=<?php echo $f0?>';}"> <span class="glyphicon glyphicon-edit"></span></a></td>
            <td align="center"><a data-toggle="tooltip" title="ลบข้อมูล" href="JavaScript:if(confirm('ต้องการจะลบหรือไม่?')==true){window.location='<?php echo $_SERVER["PHP_SELF"];?>?Page=<?php echo $Page?>&Action=Del&ID=<?php echo $f0?>';}"> <span class="glyphicon glyphicon-trash"></span></a></td>
      
        <?php
    }
    ?>
          </tr>
          <?php 
        }
        ?>
        <?php 
      }
      ?>
    </table>
  </form>
  <?php 
  mysqli_close($connect);
  ?>
</body>
</html>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>