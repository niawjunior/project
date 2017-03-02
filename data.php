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
  <?
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
      <span class="glyphicon glyphicon-search"></span>
      <select  style="text-align-last:center;" name="search" class="selectpicker show-tick" title="กรุณาเลือกสถานที่" data-live-search="true" >
        <?
        while($objResult1 = mysqli_fetch_array($objQuery5)){
          $place = $objResult1['h1'];
          ?>
          <center><option data-tokens="<?=$place?>" value="<?=$place?>"><center><?=$place?></center></option></center>
          <?
        }
        ?>
      </select>
      <button type="submit" class="btn btn-default">ค้นหา</button>
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
  if($_POST["hdnCmd"] == "Add")
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
  <form name="frmMain" method="post" action="<?=$_SERVER["PHP_SELF"];?>">
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
      <?

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
        <?
        if($objResult["ID"] == $_GET["ID"] and $_GET["Action"] == "Edit")
        {
          ?>
          <tr>
            <td><center><input  class="form-control" type="text" style="text-align:center;" name="txtplace"  value="<?=$f1?>" ></center></td>
            <td><center><input class="form-control" type="number" style="text-align:center;" name="txtlevel"  value="<?=$f2?>"></center></td>
            <td><center><input class="form-control" type="time" style="text-align:center;" name="txttime"   value="<?=$f3?>"></center></td>
            <td><center><input class="form-control" type="date" style="text-align:center;" name="txtdate"   value="<?=$f4?>"></center></td>
            <td><center><input name="btnAdd" class="btn btn-default" type="button" id="btnUpdate" value="บันทึก" OnClick="frmMain.hdnCmd.value='Update';frmMain.submit();"></center></td>
            <td><center><input name="btnAdd" class="btn btn-default" type="button" id="btnCancel" value="ยกเลิก" OnClick="window.location='<?=$_SERVER["PHP_SELF"];?>?Page=<?=$Page?><?if(isset($_GET['search'])){?>&search=<?=$search?><?}?>';"></center></td>
            <tr><input name="txtID" size="0" type="hidden" id="txtID" value="<?=$f0?>"></tr>
          </tr>
          <?
        }
        else
        {
          ?>
          <tr>
            <td><center><?php echo $f1 ?></center></td>
            <td><center><?php echo $f2 ?></center></td>
            <td><center><?php echo $f3 ?></center></td>
            <td><center><?php echo $f4 ?></center></td>
            <td align="center"><a href="JavaScript:if(confirm('ต้องการจะแก้ไขหรือไม่?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Page=<?=$Page?><?if(isset($_GET['search'])){?>&search=<?=$search?><?}?>&Action=Edit&ID=<?=$f0?>';}"> <span class="glyphicon glyphicon-edit"></span></a></td>
            <td align="center"><a href="JavaScript:if(confirm('ต้องการจะลบหรือไม่?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Page=<?=$Page?><?if(isset($_GET['search'])){?>&search=<?=$search?><?}?>&Action=Del&ID=<?=$f0?>';}"> <span class="glyphicon glyphicon-trash"></span></a></td>
          </tr>
          <?
        }
        ?>
        <?
      }
      ?>
      <tr>
        <?
        if($Rows == 1)
        {
          ?>
          <td><center><input class="form-control" type="text" style="text-align:center;" name="txtAddplace" value="<?=$PLACE_ADD?>" <?=$TXT_PLACE ?>></center></td>
          <?
        }
        else
        {
          ?>
          <td>
            <select  style="text-align-last:center;" name="PLACE" class="form-control" >
              <?
                $objQuery5 = mysqli_query($connect,"SELECT * FROM data");
              while($objResult1 = mysqli_fetch_array($objQuery5))
              {
                $place = $objResult1['h1'];
                ?>
                <center><option value="<?=$place?>"><center><?=$place?></center></option></center>
                <?
              }
              ?>
            </select>
          </td>
          <?
        }
        ?>
          <td><center>
            <input style="text-align:center;" class="form-control" type="number" name="txtAddlevel"  min="1" max="100" <?=$TXT_PLACE ?>/>
          </center>
          </td>
        <td><center><input class="form-control" type="time" style="text-align:center;" name="txtAddtime"  <?=$TXT_PLACE ?>></center></td>
        <td><center><input class="form-control" type="date" style="text-align:center;" name="txtAdddate" <?=$TXT_PLACE ?>></center></td>
        <td><center><input name="btnAdd" class="btn btn-default" type="button" id="btnAdd" width="20%" value="บันทึก" OnClick="frmMain.hdnCmd.value='Add';frmMain.submit();" <?=$TXT_PLACE ?>></td>
        <td><center><input type = "reset" class="btn btn-default" width="20%" value="เคลียร์" <?=$TXT_PLACE ?>></td>
      </tr>
    </table>
    <div align="right">
      <nav>
        <ul class="pagination">
          <li <? if($Page==1) echo 'class="disabled"'?>>
            <a href="<?$_SERVER[SCRIPT_NAME]?>?Page=1<?if(isset($_GET['search'])){?>&search=<?=$search?><?}?>" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <?
          for($i=1;$i<=$Num_Pages;$i++)
          {
            if($Page-2>=2 and ($i>2 and $i<$Page-2))
            {
              ?>
              <li><a href="<?$_SERVER[SCRIPT_NAME]?>?Page=<?php echo $i;?>&search=<?=$search?>">...</a></li>
              <?
              $i=$Page-2;
            }
            if($Page+5<=$Num_Pages and ($i>=$Page+3 and $i<=$Num_Pages-2))
            {
              ?>
              <li><a href="<?$_SERVER[SCRIPT_NAME]?>?Page=<?php echo $i; ?><?if(isset($_GET['search'])){?>&search=<?=$search?><?}?>">...</a></li>
              <?
              $i=$Num_Pages-1;
            }
            ?>
            <li <? if($Page==$i) echo 'class="active"'?>><a href="<?$_SERVER[SCRIPT_NAME]?>?Page=<?php echo $i; ?><?if(isset($_GET['search'])){?>&search=<?=$search?><?}?>"><?php echo $i; $e=$i; ?></a></li>
            <?php
          }
          ?>
          <li <? if($Page==$Num_Pages) echo 'class="disabled"'?>>
            <a href="<?$_SERVER[SCRIPT_NAME]?>?Page=<?php echo $Num_Pages;?><?if(isset($_GET['search'])){?>&search=<?=$search?><?}?>" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </form>
  </body>
  </html>


