<?php
session_start();
require_once("config.php");
require_once("connect.php");
date_default_timezone_set('Asia/Bangkok');
?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <?php 
    $connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
    if($_GET["Action"] == "Del")
    {
    $objQuery = mysqli_query($connect, "DELETE FROM member WHERE ID = '".$_GET["ID"]."' ");
    }
    $objQuery = mysqli_query($connect, "SELECT * FROM member ORDER BY ID DESC ");
    $objQuery1 = mysqli_query($connect, "SELECT * FROM member WHERE on_off ='ONLINE' ");
    $NUM = mysqli_num_rows($objQuery1);
    ?>
    <form class="nav navbar-nav navbar-right">
      <span class="glyphicon glyphicon-user"></span>&nbsp;<span class="label label-info round btn-xs">สมาชิก Online : <?php echo $NUM?> คน&nbsp;&nbsp;</span>
      <br><br>
    </form>
    <form name="frmMain" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
      <input type="hidden" name="hdnCmd" value="">
      <table class="table table-hover  "  border="0" >
        <tr>
          <thead class="thead-inverse">
            <th class="default" width="10%" height="50"> <div align="center"><strong>ชื่อสมาชิก</strong></div></th>
            <th class="default" width="10%" height="50"> <div align="center"><strong>สถานะ</strong></div></th>
            <th class="default" width="13%" height="50"> <div align="center"><strong>ออนไลน์/ออฟไลน์</strong></div></th>
            <th class="default" width="20%" height="50"> <div align="center"><strong>เข้าสู่ระบบล่าสุด</strong></div></th>
            <th class="default" width="40%" height="50"> <div align="center"><strong>กิจกรรมล่าสุด</strong></div></th>
          </tr>
        </thead>
        <?php 
        while($objResult = mysqli_fetch_array($objQuery))
        {
        $f0 = $objResult['ID'];
        $f1 = $objResult['user'];
        $f2 = $objResult['on_off'];
        $f7 = $objResult['status'];
        $f8 = $objResult['time'];
        $f9 = $objResult['date'];
        $f10 = $objResult['lastactivity'];
        $f11 = $objResult['countatvt'];
        ?>
        <?php 
        {
        ?>
        <tr>
          <td><center><?php echo $f1 ?></center></td>
          <td ><center><?php echo $f7 ?></center></td>
          <?php 
          if($f2=='ONLINE')
          {
          $icon='<span class="glyphicon glyphicon-record" style="color:#7ff97f"></span>';
          }
          else
          {
          $icon='<span class="glyphicon glyphicon-record" style="color:#f76c6c"></span>';
          }
          ?>
          <td align="center"> <?php echo $icon?></td>
          <td ><center><?php echo $f8 ?> | <?php echo $f9 ?></center></td>
          <td><center><?php echo $f10?> <?php if($f10 !==""){
            ?>
            <a class="text-primary" href="allactivity.php?user=<?php echo $f1?>" target="_blank"><button type="button" class="btn btn-warning round btn-xs">ทั้งหมด <span class="badge"><?php echo $f11?></span></button>  </a>
            <?php 
          }?></center></td>
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