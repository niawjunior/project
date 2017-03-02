<?
require_once("connect.php");
require_once("config.php");
?>
<?
$connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
$objQuery1 = mysqli_query($connect,"SELECT * FROM upload");
$Num_Rows = mysqli_num_rows($objQuery1);
$Per_Page = 5;
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
$objQuery5 = mysqli_query($connect,"SELECT * FROM upload order by ID desc  LIMIT $Page_Start , $Per_Page");
?>
<table class="table table-hover" >
  <tr bg>
    <th  width="30%" height="50"> <div align="center">เรื่อง</div></th>
    <th  width="15%" height="50"> <div align="center">วันที่</div></th>
    <th  width="10%" height="50"> <div align="center">ไฟล์ประกอบ</div></th>
  </tr>
  
  <?
  while($objResult5 = mysqli_fetch_array($objQuery5))
  {
  
  $f00 = $objResult5['ID'];
  $f22 = $objResult5['t2'];
  $f33 = $objResult5['url'];
  $f44 = $objResult5['date'];
  ?>
  <tr class="bg-style">
    <td><center><?php echo $f22 ?></center></td>
    <td><center><?php echo $f44 ?></center></td>
    <td><center><a class="text-primary" href="myfile/<?=$f33?>" target="_blank"><span class="glyphicon glyphicon-link"></span></a></center></td>
  </tr>
  <?
  }
  ?>
</table>
<center>
<nav>
  <ul class="pagination">
    <li <? if($Page==1) echo 'class="disabled"'?>>
      <a href="<?$_SERVER[SCRIPT_NAME]?>?Page=1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?
    for($i=1;$i<=$Num_Pages;$i++)
    {
    if($Page-2>=2 and ($i>2 and $i<$Page-2))
    {
    ?>
    <li><a href="<?$_SERVER[SCRIPT_NAME]?>?Page=<?php echo $i;?>">...</a></li>
    <?
    $i=$Page-2;
    }
    if($Page+5<=$Num_Pages and ($i>=$Page+3 and $i<=$Num_Pages-2))
    {
    ?>
    <li><a href="<?$_SERVER[SCRIPT_NAME]?>?Page=<?php echo $i; ?>">...</a></li>
    <?
    $i=$Num_Pages-1;
    }
    ?>
    <li <? if($Page==$i) echo 'class="active"'?>><a href="<?$_SERVER[SCRIPT_NAME]?>?Page=<?php echo $i; ?>"><?php echo $i; $e=$i; ?></a></li>
    <?php
    }
    ?>
    <li <? if($Page==$Num_Pages) echo 'class="disabled"'?>>
      <a href="<?$_SERVER[SCRIPT_NAME]?>?Page=<?php echo $Num_Pages;?>" aria-label="Next">
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