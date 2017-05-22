<?php
session_start();
if($_SESSION["STATUS"]=='')
{
  header('Location: 404.php');
  exit();
}
require_once("connect.php");
require_once("config.php");
?>
<html>
  <body>
    <?php 
    $US = $_SESSION["USER"];
    $US_ID = $_GET['User'];
    $connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
    $objQuery4 = mysqli_query($connect,"SELECT * FROM member where user='$US'");
    while ($result4 = mysqli_fetch_array($objQuery4))
    {
      $passwordcheck= $result4['pass'];
      $status_user = $result4['status'];
    }
    $password1=md5(md5(md5($_POST['txtpass'])));
    $STATUS = $_SESSION["status"];
    $ID = $_SESSION["ID"];
    $connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
    if($_GET["Action"] == "Update" and $password1 == $passwordcheck )
    {
      if($_POST["inputPasswordConfirm"] !=="")
      {
        $objQuery2 = mysqli_query($connect,"SELECT * FROM member WHERE ID='$ID'");
        while($objResult2 = mysqli_fetch_array($objQuery2))
        {
          if($objResult2['img'] !=="" and $_POST["txtphoto"] !=="" )
          {
            $pofile = $_POST["txtphoto"];
          }
          else if($objResult2['img'] !=="" and $_POST["txtphoto"] =="" )
          {
            $pofile = $objResult2['img'];
          }
          else if($objResult2['img'] =="" and $_POST["txtphoto"] !=="" )
          {
            $pofile = $_POST["txtphoto"];
          }
          else
          {
            $pofile = '/photo/user.png';
          }
        }
        $objQuery = mysqli_query($connect,"UPDATE member SET pass = '".md5(md5(md5($_POST["inputPasswordConfirm"])))."',name = '".$_POST["txtname"]."',email = '".$_POST["txtemail"]."',sex = '".$_POST["txtsex"]."',tel = '".$_POST["txttel"]."',status = '$status_user',img = '$pofile' WHERE ID = '$ID' ");
      ?>
      <script>
        function logout(){
         window.top.location = "logout.php";
        }
        $(window).load(function()
        {
        $('#myModal').modal('show');
        setTimeout("logout()",1000);
        });
        </script>
      <?php
      }
    else
        {
          $objQuery2 = mysqli_query($connect,"SELECT * FROM member WHERE ID='$ID'");
          while($objResult2 = mysqli_fetch_array($objQuery2))
          {
            if($objResult2['img'] !=="" and $_POST["txtphoto"] !=="" )
            {
              $pofile = $_POST["txtphoto"];
            }
            else if($objResult2['img'] !=="" and $_POST["txtphoto"] =="" )
            {
              $pofile = $objResult2['img'];
            }
            else if($objResult2['img'] =="" and $_POST["txtphoto"] !=="" )
            {
              $pofile = $_POST["txtphoto"];
            }
            else
            {
              $pofile = 'photo/user.png';
            }
          }
          $objQuery = mysqli_query($connect,"UPDATE member SET name = '".$_POST["txtname"]."',email = '".$_POST["txtemail"]."',sex = '".$_POST["txtsex"]."',tel = '".$_POST["txttel"]."',status = '$status_user',img = '$pofile' WHERE ID = '$ID' ");
        }
        ?>
        <script>
        function redirect(){
         window.top.location = "profile.php?Action=Profile";
        }
        $(window).load(function()
        {
        $('#myModal').modal('show');
        setTimeout("redirect()",2000);
        });
        </script>
        <div class="container">
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">ระบบแจ้งเตือน</h4>
                </div>
                <div class="modal-body">
                  <p>บันทึกข้อมูลเรียบร้อยแล้ว</p>
                </div>
                <div class="modal-footer">
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php 
    }
    if($_GET["Action"] == "Update" and $password1 !== $passwordcheck )
    {
    ?>
    <script>
    $(window).load(function()
    {
    $('#myModal').modal('show');
    setTimeout("",2000);
    });
    </script>
    <div class="container">
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ระบบแจ้งเตือน</h4>
            </div>
            <div class="modal-body">
              <p>รหัสผ่านไม่ถูกต้อง กรุณากรอกรหัสผ่านให้ถูกต้อง เพื่อบันทึกข้อมูล.</p>
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php 
    }
    if($US_ID=='')
    {
      $NAME = $ID;
    }
    else
    {
      $NAME = $US_ID;
    }
    $objQuery = mysqli_query($connect,"SELECT * FROM member WHERE ID='$NAME'");
    ?>
    <form  role="form" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>?Action=Update&ID=<?php echo $_GET["ID"];?>">
          <div class="panel-body">
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
            if($objResult['img']=="")
            {
              $f8 = "photo/user.png";
            }
            else
            {
              $f8 = $objResult['img'];
            }
            if($objResult["ID"] == $_GET["ID"] and $_GET["Action"] == "Edit")
            {
              require_once("modules/function_profile_edit.php");
            }
            else
            {
             require_once("modules/function_profile.php");
            }
          }
          ?>  

                <div class="modal fade" id="loginModal"  aria-labelledby="Login" aria-hidden="true">
                  <div class="modal-dialog modl-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" value="" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                        <h3 class="modal-title custom_align" id="Heading">ยืนยันการบันทึก?</h3>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <h4><label class="col-md-3 control-label"><span class="glyphicon glyphicon-lock"> </span> รหัสผ่าน</label></h4>
                          <div class="col-md-6">
                            <input type="password" autofocus="autofocus"  class="form-control" name="txtpass" placeholder="กรุณากรอกรหัสผ่านให้ถูกต้อง" required /></div>     
                          <button data-toggle="tooltip" title="กดยืนยันเพื่อบันทึกข้อมูล" type="submit" class="btn btn-success">ยืนยัน <span class="glyphicon glyphicon-ok-sign"></span></button>
                        </div>
                      </div>
                      <br>
                    </div>
                  </div>
                </div>
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