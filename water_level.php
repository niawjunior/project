<html>
  <head>
  </head>
  <?
  require_once("connect.php");
  require_once("config_home.php");
  ?>
  <?
  $connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
  $PAGE = $_GET["PAGE"];
  $objQuery1 = mysqli_query($connect,"SELECT * FROM water_table") or die ("Error Query [".$strSQL."]");

  $objQuery4 = mysqli_query($connect,"SELECT * FROM water_table WHERE place='$PAGE' ") or die ("Error Query [".$strSQL."]");

if($PAGE=="")
{
  $num_query = $objQuery1;
}
else
{
  $num_query = $objQuery4;
}
  $Num_Rows = mysqli_num_rows($num_query);

  if ($_GET["PAGE"]!="")
  {
      $Per_Page = 20;
  }
  else
  {
      $Per_Page = 5;
  }

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
  $objQuery = mysqli_query($connect,"SELECT * FROM water_table ORDER BY ID DESC LIMIT $Page_Start , $Per_Page");

   $objQuery2 = mysqli_query($connect,"SELECT * FROM water_table WHERE place='$PAGE' ORDER By ID DESC LIMIT $Page_Start , $Per_Page")
  ?>
  <?php 
  function heading()
  {
    ?>
    <center>
      <h1>
    <thead>บันทึกระดับน้ำ<?echo $_GET['PAGE'];?></thead>
    </h1>
    </center>
    <?php
  }
  ?>
  <?php
  if ($_GET["PAGE"]!="")
  {
    heading();
  }
  ?>
  <table class="table table-hover" >
    <tr bg>
      <th  width="25%" height="50"> <div align="center"><strong>สถานที่</strong></div></th>
      <th  width="20%" height="50"> <div align="center"><strong>(เมตร)</strong></div></th>
      <th></th>
      <th  width="20%" height="50"> <div align="center"><strong>เวลา</strong></div></th>
      <th  width="20%" height="50"> <div align="center"><strong>วันที่</strong></div></th>
      <th  width="25%" height="50"> <div align="center"><strong>หมายเหตุ</strong></div></th>
    </tr>
    <?
    if($PAGE=="")
    {
      $sql_Query = $objQuery;
    }
    else
    {
      $sql_Query = $objQuery2;
    }
    $max=0;
    while($objResult = mysqli_fetch_array($sql_Query))
    {
    $f0 = $objResult['ID'];
    $f1 = $objResult['place'];
    $f2 = $objResult['level'];
    $f3 = $objResult['time'];
    $f4 = $objResult['date'];
    $f5 = $objResult['deep'];
    if (($f2*100)/$f5>100)
    {
    $check="เกินความจุ";
    $color_label="danger";
    }
    else if((($f2*100)/$f5>80) and (($f2*100)/$f5<=100))
    {
    $check="น้ำมาก";
    $color_label="warning";
    }
    else if((($f2*100)/$f5>50) and (($f2*100)/$f5<=80))
    {
    $check="น้ำปานกลาง";
    $color_label="success";
    }
    else if((($f2*100)/$f5>30) and (($f2*100)/$f5<=50))
    {
    $check="น้ำน้อย";
    $color_label="warning";
    }
    else
    {
    $check="น้ำน้อยวิกฤติ";
    $color_label="danger";
    }
    ?>
    <tr class="bg-style">
      <td><center><a class="text-primary" href="<?$_SERVER[SCRIPT_NAME]?>?PAGE=<?=$f1?>" target="_blank"><?php echo $f1 ?></a></center></td>
      <td><center><?php echo $f2 ?></center></td>
      <td><?echo $count?></span></td>
      <td><center><?php echo $f3 ?></center></td>
      <td><center><?php echo $f4 ?></center></td>
      <td><center><span class="label label-<?=$color_label?>"><?php echo $check ?></span></center></td>
    </tr>
    <?
    }
    ?>
  </table>
  <center>
  <nav>
    <ul class="pagination">
      <li <? if($Page==1) echo 'class="disabled"'?>>
        <a href="<?$_SERVER[SCRIPT_NAME]?>?Page=1&PAGE=<?php echo $PAGE?>" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <?
      for($i=1;$i<=$Num_Pages;$i++)
      {
      if($Page-2>=2 and ($i>2 and $i<$Page-2))
      {
      ?>
      <li><a href="<?$_SERVER[SCRIPT_NAME]?>?Page=<?php echo $i;?>&PAGE=<?php echo $PAGE?>">...</a></li>
      <?
      $i=$Page-2;
      }
      if($Page+5<=$Num_Pages and ($i>=$Page+3 and $i<=$Num_Pages-2))
      {
      ?>
      <li><a href="<?$_SERVER[SCRIPT_NAME]?>?Page=<?php echo $i; ?>&PAGE=<?php echo $PAGE?>">...</a></li>
      <?
      $i=$Num_Pages-1;
      }
      ?>
      <li <?php if($Page==$i) echo 'class="active"'?>><a href="<?$_SERVER[SCRIPT_NAME]?>?Page=<?php echo $i; ?>&PAGE=<?php echo $PAGE?>"><?php echo $i; $e=$i; ?></a></li>
      <?php
      }
      ?>
      <li <? if($Page==$Num_Pages) echo 'class="disabled"'?>>
        <a href="<?$_SERVER[SCRIPT_NAME]?>?Page=<?php echo $Num_Pages;?>&PAGE=<?php echo $PAGE?>" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
  </center>
</form>
<?
mysqli_close($connect);
?>
</body>
</html>