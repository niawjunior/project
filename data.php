<?php
require_once("connect.php");
require_once("config.php");
?>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
</head>
<body>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php 
  session_start();
  date_default_timezone_set('Asia/Bangkok');
  $date = date("d-m-Y");
  $time = date("H:i:s");
  $connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
  $POST = $_SESSION["USER"];
  $connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
  $objQuery5 = mysqli_query($connect,"SELECT * FROM data");

  ?>
  <form class="navbar-form navbar-left"  method="get" action="<?php $_SERVER["PHP_SELF"];?>?<?$_POST['search'];?>">
    <div class="form-group">
      <select  style="text-align-last:center;" name="search" class="selectpicker show-tick" title="กรุณาเลือกสถานที่" data-live-search="true" required >
        <?php
        while($objResult1 = mysqli_fetch_array($objQuery5)){
          $place = $objResult1['h1'];
          ?>
          <center><option data-tokens="<?php echo $place?>" value="<?php echo $place?>" required><center><?php echo $place?></center></option></center>
          <?php 
        }
        ?>
      </select>
      <button type="submit" class="btn btn-default">ค้นหา <span class="glyphicon glyphicon-search"></span></button>
    </div>
  </form>
  <?

  $objQuery3 = mysqli_query($connect,"SELECT * FROM showdata");
  $Rows = mysqli_num_rows($objQuery3);
  while($objResult = mysqli_fetch_array($objQuery3))
  {
    $f111 = $objResult['showh1'];
    $f222 = $objResult['showdeep'];
  }
  if($Rows == 1)
  {
    $PLACE_ADD = $f111;
    $TXT_PLACE = 'disabled';
    $LEVEL_ADD = $_GET['LEVEL'];
    $TIME_ADD = date("H:i");
    $DATE_ADD = date("d-m-Y");
    $DEEP_ADD =  $f222;
    $DEEP_EDIT =  $_POST["txtdeep"];
  }
  else
  {
    $PLACE_ADD = $_POST["txtAddplace"];
    $LEVEL_ADD = $_POST["txtAddlevel"];
    $TIME_ADD = $_POST["txtAddtime"];
    $DATE_ADD = $_POST["txtAdddate"];
  }
  if($_GET["Action"] == "ADD")
  {
    mysqli_query($connect,"INSERT INTO water_table (place,level,deep,time,date) VALUES  ('$PLACE_ADD','$LEVEL_ADD','$DEEP_ADD','$TIME_ADD','$DATE_ADD') ");
    
  }
  if(isset($_POST["submit"]))
  {
    $objQuery4 = mysqli_query($connect,"SELECT * FROM data WHERE h1 = '".$_POST["PLACE"]."'");
    while($objResult = mysqli_fetch_array($objQuery4))
    {
      $DEEP = $objResult['deep'];
    }
    mysqli_query($connect,"INSERT INTO water_table (place,level,deep,time,date) VALUES  ('".$_POST["PLACE"]."','$LEVEL_ADD',' $DEEP','$TIME_ADD','$DATE_ADD') ");
    mysqli_query($connect,"UPDATE data SET level = '$LEVEL_ADD',time = '$TIME_ADD',date = '$DATE_ADD' WHERE h1 = '$f111' ");
    mysqli_query($connect,"INSERT INTO activity (user,time,date,atvt,note) VALUES  ('$POST','$time',' $date','เพิ่มข้อมูลระดับน้ำ','เพิ่มข้อมูล | สถานที่ ".$_POST["PLACE"]." | ระดับน้ำ $LEVEL_ADD เมตร ') ");
    mysqli_query($connect,"UPDATE member SET lastactivity = 'เพิ่มข้อมูล | สถานที่ ".$_POST["PLACE"]." | ระดับน้ำ $LEVEL_ADD เมตร '  where user = '$POST'");
    mysqli_query($connect,"UPDATE member SET countatvt = countatvt+1 where user = '$POST'");
  }
  if($_POST["hdnCmd"] == "Update")
  {
    mysqli_query($connect,"UPDATE water_table SET place = '".$_POST["txtplace"]."',level = '".$_POST["txtlevel"]."',time = '".$_POST["txttime"]."',date = '".$_POST["txtdate"]."'WHERE ID = '".$_POST["txtID"]."' ");
    mysqli_query($connect,"UPDATE data SET level = '".$_POST["txtlevel"]."',time = '".$_POST["txttime"]."',date = '".$_POST["txtdate"]."' WHERE h1 = '".$_POST["txtplace"]."' ");
    $mysql_query8 = mysqli_query($connect,"SELECT * FROM water_table WHERE ID = '".$_POST["txtID"]."'");
    while($objResult8 = mysqli_fetch_array($mysql_query8))
    {
      $data1 = $objResult8['ID'];
      $data2 = $objResult8['place'];
      $data3 = $objResult8['level'];
    }
    mysqli_query($connect,"INSERT INTO activity (user,time,date,atvt,note) VALUES  ('$POST','$time',' $date','แก้ไขข้อมูลระดับน้ำ','แก้ไขข้อมูล | สถานที่ $data2 | ไอดี $data1 | ระดับน้ำ $data3 เมตร ') ");
    mysqli_query($connect,"UPDATE member SET lastactivity = 'แก้ไขข้อมูล | สถานที่ $data2 | ระดับน้ำ $data3 เมตร '  where user = '$POST'");
    mysqli_query($connect,"UPDATE member SET countatvt = countatvt+1 where user = '$POST'");

?>

    <?php
  }
  if($_GET["Action"] == "Del")
  {
    mysqli_query($connect,"UPDATE member SET countatvt = countatvt+1 where user = '$POST'");
    $mysql_query8 = mysqli_query($connect,"SELECT * FROM water_table WHERE ID = '".$_GET["ID"]."'");
    while($objResult8 = mysqli_fetch_array($mysql_query8))
    {
      $data1 = $objResult8['ID'];
      $data2 = $objResult8['place'];
      $data3 = $objResult8['level'];
    }
    mysqli_query($connect,"INSERT INTO activity (user,time,date,atvt,note) VALUES  ('$POST','$time',' $date','ลบข้อมูลระดับน้ำ','ลบข้อมูล | สถานที่ $data2 | ไอดี $data1 | ระดับน้ำ $data3 เมตร ') ");
    mysqli_query($connect,"UPDATE member SET lastactivity = 'ลบข้อมูล | สถานที่ $data2 | ระดับน้ำ $data3 เมตร '  where user = '$POST'");
    mysqli_query($connect,"DELETE FROM water_table WHERE ID = '".$_GET["ID"]."'");
  }
  $search= $_GET['search'];
   $objQuery11 = mysqli_query($connect,"SELECT * FROM water_table ORDER BY ID DESC");

    $objQuery14 = mysqli_query($connect,"SELECT * FROM water_table WHERE (place  = '$search') ORDER BY ID DESC");

   if(isset($_GET['search']))
      {
        $objQuery_NUM = $objQuery14;
      }
   else
      {
       $objQuery_NUM = $objQuery11;
      }
  $Num_Rows = mysqli_num_rows($objQuery_NUM);
  $Per_Page =20;
  $Page = $_GET["Page"];
  if(!$_GET["Page"])
  {
    $Page=1;
  }
  $Prev_Page = $Page-1;
  $Next_Page = $Page+1;
  $Page_Start = (($Per_Page*$Page)-$Per_Page);
  if($Num_Rows<=$Per_Page)
  {
    $Num_Pages =1;
  }
  else if(($Num_Rows % $Per_Page)==0)
  {
    $Num_Pages =($Num_Rows/$Per_Page) ;
  }
  else
  {
    $Num_Pages =($Num_Rows/$Per_Page)+1;
    $Num_Pages = (int)$Num_Pages;
  }
  ?>
  <form name="frmMain" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    <input type="hidden" name="hdnCmd" value="">
    <table class="table table-hover  "  border="0" id="bootstrap-table">
      <tr>
        <thead class="thead-inverse">
          <th class="default" width="25%" height="50"> <div align="center">สถานที่</div></th>
          <th class="default" width="25%" height="50"> <div align="center">ระดับน้ำ(เมตร)</div>
          </th>
          <th class="default" width="25%" height="50"> <div align="center">เวลา</div></th>
          <th class="default" width="25%" height="50"> <div align="center">วันที่</div></th>
          <th class="default" width="20%" height="50"> <div align="center">แก้ไข</div></th>
          <th class="default" width="20%" height="50"> <div align="center">ลบ</div></th>
        </thead>
      </tr>
      <?php 

    $objQuery3 = mysqli_query($connect,"SELECT * FROM water_table WHERE (place  = '$search') ORDER BY ID DESC LIMIT $Page_Start , $Per_Page");

    $objQuery4 = mysqli_query($connect,"SELECT * FROM water_table ORDER BY ID DESC LIMIT $Page_Start , $Per_Page");

      if(isset($_GET['search']))
      {
        $objQuery = $objQuery3;
      }
      else
      {
       $objQuery = $objQuery4;
      }

      while($objResult = mysqli_fetch_array($objQuery))
      {
        $f0 = $objResult['ID'];
        $f1 = $objResult['place'];
        $f2 = $objResult['level'];
        $f3 = $objResult['time'];
        $f4 = $objResult['date'];
        ?>
        <?php 
        if($objResult["ID"] == $_GET["ID"] and $_GET["Action"] == "Edit")
        {
          ?>
          <tr>
            <td><center><input  class="form-control" type="text" style="text-align:center;" name="txtplace"  value="<?php echo $f1?>" ></center></td>
            <td><center><input class="form-control" type="number" style="text-align:center;" name="txtlevel"  value="<?php echo $f2?>"></center></td>
            <td><center><input class="form-control" type="time" style="text-align:center;" name="txttime"   value="<?php echo $f3?>"></center></td>
            <td><center><input class="form-control" type="date" style="text-align:center;" name="txtdate"   value="<?php echo $f4?>"></center></td>
            <td><center><button name="btnAdd" class="btn btn-success" id="btnUpdate"  OnClick="frmMain.hdnCmd.value='Update';frmMain.submit();">บันทึก <span class="glyphicon glyphicon-ok-sign"></span></button></center></td>
            <td><center><button name="btnAdd" class="btn btn-warning" id="btnCancel" OnClick="window.location='<?php echo $_SERVER["PHP_SELF"];?>?Page=<?php echo $Page?><?php if(isset($_GET['search'])){?>&search=<?php echo $search?><?php }?>';">ยกเลิก <span class="glyphicon glyphicon-share-alt"></span></button></center></td>
            <tr><input name="txtID" size="0" type="hidden" id="txtID" value="<?php echo $f0?>"></tr>
          </tr>
          <?php 
        }
        else
        {
          ?>
          <tr>
            <td><center><?php echo $f1 ?></center></td>
            <td><center><?php echo $f2 ?></center></td>
            <td><center><?php echo $f3 ?></center></td>
            <td><center><?php echo $f4 ?></center></td>
            <td align="center"><a href="JavaScript:if(confirm('ต้องการจะแก้ไขหรือไม่?')==true){window.location='<?php echo $_SERVER["PHP_SELF"];?>?Page=<?php echo $Page?><?php if(isset($_GET['search'])){?>&search=<?php echo $search?><?php }?>&Action=Edit&ID=<?php echo $f0?>';}"> <span class="glyphicon glyphicon-edit"></span></a></td>
            <td align="center"><a href="JavaScript:if(confirm('ต้องการจะลบหรือไม่?')==true){window.location='<?php echo $_SERVER["PHP_SELF"];?>?Page=<?php echo $Page?><?php if(isset($_GET['search'])){?>&search=<?php echo $search?><?php }?>&Action=Del&ID=<?php echo $f0?>';}"> <span class="glyphicon glyphicon-trash"></span></a></td>
          </tr>
          <?php
        }
        ?>
        <?php 
      }
      ?>
      <tr>
        <?php 
        if($Rows == 1)
        {
          ?>
          <td><center><input class="form-control" type="text" style="text-align:center;" name="txtAddplace" value="<?php echo $PLACE_ADD?>" <?php echo $TXT_PLACE ?>></center></td>
          <?php 
        }
        else
        {
          ?>
          <td>
            <select  style="text-align-last:center;" name="PLACE" class="form-control" >
              <?php 
                $objQuery5 = mysqli_query($connect,"SELECT * FROM data");
              while($objResult1 = mysqli_fetch_array($objQuery5))
              {
                $place = $objResult1['h1'];
                ?>
                <center><option value="<?php echo $place?>"><center><?php echo $place?></center></option></center>
                <?php 
              }
              ?>
            </select>
          </td>
          <?php 
        }
        ?>
          <td><center>
            <input style="text-align:center;" class="form-control" type="number" name="txtAddlevel"  min="0" max="100" required <?php echo $TXT_PLACE ?>/>
          </center>
          </td>
        <td><center><input class="form-control" type="time" style="text-align:center;" name="txtAddtime" required <?php echo $TXT_PLACE ?>></center></td>
        <td><center><input class="form-control" type="date" style="text-align:center;" name="txtAdddate" required <?php echo $TXT_PLACE ?>></center></td>
        <td><center><button name="submit" class="btn btn-success" id="submit" width="20%" value=""  <?php echo $TXT_PLACE ?>>บันทึก <span class="glyphicon glyphicon-ok-sign"></span></button></center></td>
        <td><center><button type = "reset" class="btn btn-warning" width="20%" <?php echo $TXT_PLACE ?>>เคลียร์ <span class="glyphicon glyphicon-remove-sign"></button></center></td>        
        <!--<td><center><button type = "reset" class="btn btn-warning" width="20%" <?php echo $TXT_PLACE ?>>เคลียร์ <span class="glyphicon glyphicon-remove-sign"></button></center></td>-->
      </tr>
    </table>
    <div align="right">
      <nav>
        <ul class="pagination">
          <li <?php  if($Page==1) echo 'class="disabled"'?>>
            <a href="<?php $_SERVER[SCRIPT_NAME]?>?Page=1<?php if(isset($_GET['search'])){?>&search=<?php echo $search?><?php }?>" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <?php 
          for($i=1;$i<=$Num_Pages;$i++)
          {
            if($Page-2>=2 and ($i>2 and $i<$Page-2))
            {
              ?>
              <li><a href="<?php $_SERVER[SCRIPT_NAME]?>?Page=<?php echo $i;?>&search=<?php echo $search?>">...</a></li>
              <?php 
              $i=$Page-2;
            }
            if($Page+5<=$Num_Pages and ($i>=$Page+3 and $i<=$Num_Pages-2))
            {
              ?>
              <li><a href="<?php $_SERVER[SCRIPT_NAME]?>?Page=<?php echo $i; ?><?php if(isset($_GET['search'])){?>&search=<?php echo $search?><?php }?>">...</a></li>
              <?php 
              $i=$Num_Pages-1;
            }
            ?>
            <li <?php  if($Page==$i) echo 'class="active"'?>><a href="<?php $_SERVER[SCRIPT_NAME]?>?Page=<?php echo $i; ?><?php if(isset($_GET['search'])){?>&search=<?php echo $search?><?php }?>"><?php echo $i; $e=$i; ?></a></li>
            <?php
          }
          ?>
          <li <?php  if($Page==$Num_Pages) echo 'class="disabled"'?>>
            <a href="<?php $_SERVER[SCRIPT_NAME]?>?Page=<?php echo $Num_Pages;?><?php if(isset($_GET['search'])){?>&search=<?php echo $search?><?php }?>" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </form>
  </body>
  </html>


