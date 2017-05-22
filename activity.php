<?php
session_start();
if($_SESSION["STATUS"]=='')
{
  header('Location: 404.php');
  exit();
}
require_once("config.php");
require_once("connect.php");
$loggedTime=time()-10;
?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <?php 
    $connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
    $objQuery = mysqli_query($connect, "SELECT * FROM member ORDER BY ID DESC ");
    ?>
    <br>
    <div align="right">
    <label id="count" class="label label-success round btn-lg"><span  class="glyphicon glyphicon-user"></span></label>
</div><br>
    <form name="" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
      <table class="table table-hover  "  border="0" >
        <tr>
          <thead class="thead-inverse">
            <th class="default" width="10%" height="50"> <div align="center"><strong>ชื่อสมาชิก</strong></div></th>
            <th class="default" width="10%" height="50"> <div align="center"><strong>สถานะ</strong></div></th>
            <th class="default" width="13%" height="50"> <div align="center"><strong>ออนไลน์/ออฟไลน์</strong></div></th>
            <th class="default" width="20%" height="50"> <div align="center"><strong>เข้าสู่ระบบล่าสุด</strong></div></th>
                      <?php if($_SESSION["status"] == 'ADMIN')
          {
            ?>
            <th class="default" width="40%" height="50"> <div align="center"><strong>กิจกรรมล่าสุด</strong></div></th>

            <?php
          }
          ?>
          </tr>
        </thead>
        <?php 
         $coun = 0;
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
        $f12 = $objResult['time_log'];
        {
        ?>
        <tr>
          <td><center><?php echo $f1 ?></center></td>
          <td ><center><?php echo $f7 ?></center></td>
          <?php 

          if($f12>$loggedTime)
          {
            $icon='<span class="glyphicon glyphicon-record" style="color:#7ff97f"></span>';
            $count = $count+1;
            ?>
            <script>
            var count =  document.getElementById('count').innerHTML = 'online '+'<?php echo $count;?>'+' คน';
            </script>

            <?php
          }
          else
          {
             $icon='<span class="glyphicon glyphicon-record" style="color:#f76c6c"></span>';
          }
          ?>
          <td align="center"> <?php echo $icon?></td>
          <td ><center><?php echo $f8 ?> | <?php echo $f9 ?></center></td>
          
          <?php if($_SESSION["status"] == 'ADMIN')
          {
            ?>
            <td><center><?php echo $f10?> <?php if($f10 !==""){
            ?>
            <a class="text-primary" href="allactivity.php?user=<?php echo $f1?>" target="_blank">
            <button data-toggle="tooltip" title="คลิ้๊กเพื่อดูทั้งหมด" type="button" class="btn btn-warning round btn-xs">ทั้งหมด <span class="badge"><?php echo $f11?></span></button>
            </a>
            <?php 
          }?></center></td>
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