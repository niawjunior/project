<?php 
require_once("connect.php");
require_once("config.php");
?>
<?php 
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
    <th  width="30%" height="50"> <div align="center"><strong>เรื่อง</strong></div></th>
    <th  width="15%" height="50"> <div align="center"><strong>วันที่</strong></div></th>
    <th  width="10%" height="50"> <div align="center"><strong>ไฟล์ประกอบ</strong></div></th>
  </tr>
  
  <?php 
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
    <td><center><a class="text-primary" href="myfile/<?php echo $f33?>" target="_blank"><span class="glyphicon glyphicon-link"></span></a></center></td>
  </tr>
  <?php 
  }
  ?>
</table>
<center>
<nav>
  <ul class="pagination">
    <li <?php  if($Page==1) echo 'class="disabled"'?>>
      <a href="<?php $_SERVER[SCRIPT_NAME]?>?Page=1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php 
    for($i=1;$i<=$Num_Pages;$i++)
    {
    if($Page-2>=2 and ($i>2 and $i<$Page-2))
    {
    ?>
    <li><a href="<?php $_SERVER[SCRIPT_NAME]?>?Page=<?php echo $i;?>">...</a></li>
    <?php 
    $i=$Page-2;
    }
    if($Page+5<=$Num_Pages and ($i>=$Page+3 and $i<=$Num_Pages-2))
    {
    ?>
    <li><a href="<?php $_SERVER[SCRIPT_NAME]?>?Page=<?php echo $i; ?>">...</a></li>
    <?php 
    $i=$Num_Pages-1;
    }
    ?>
    <li <?php  if($Page==$i) echo 'class="active"'?>><a href="<?php $_SERVER[SCRIPT_NAME]?>?Page=<?php echo $i; ?>"><?php echo $i; $e=$i; ?></a></li>
    <?php
    }
    ?>
    <li <?php  if($Page==$Num_Pages) echo 'class="disabled"'?>>
      <a href="<?php $_SERVER[SCRIPT_NAME]?>?Page=<?php echo $Num_Pages;?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</center>
</form>
<?php 
mysqli_close($connect);
?>