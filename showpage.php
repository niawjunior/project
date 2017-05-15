<?php
require_once("connect.php");
require_once("config.php");
?>
<?php
$connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
$strSQL1 = "SELECT * FROM data ";
$objQuery1 = mysqli_query($connect,"SELECT * FROM data");
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
$objQuery3 = mysqli_query($connect,"SELECT * FROM data order by ID desc  LIMIT $Page_Start , $Per_Page");
$objQuery4 = mysqli_query($connect,"SELECT * FROM showdata");
while($objResult4 = mysqli_fetch_array($objQuery4))
{
  $f1111 = $objResult4['showh1'];
}
?>
<table class="table table-hover" >
  <tr bg>
    <th  width="15%" height="50"> <div align="center"><strong>สถานที่</strong></div></th>
    <th  width="60%" height="50"> <div align="center"><strong>คำอธิบาย</strong></div></th>
    <th  width="5%" height="50"> <div align="center"><strong>สถานะ</strong></div></th>
    <th  width="15%" height="50"> <div align="center"><strong>รูปภาพ</strong></div></th>
  </tr>
  <?
  while($objResult3 = mysqli_fetch_array($objQuery3))
  {
  $ID = $objResult3['ID'];
  $f000 = $objResult3['h1'];
  $f111 = $objResult3['h2'];
  $f222 = $objResult3['la'];
  $f333 = $objResult3['lo'];
  $f444 = $objResult3['url'];
  ?>
  <?php
  if($f000==$f1111)
  {
    $icon='<span class="glyphicon glyphicon-record" style="color:#7ff97f"></span>';
  }
  else
  {
    $icon='<span class="glyphicon glyphicon-record" style="color:#f76c6c"></span>';
  }
  ?>
  <tr class="bg-style">
    <td><center><a class="text-primary" href="map.php?ID=<?=$ID?>" target="_blank"><?php echo $f000 ?></a></center></td>
     <td><center><?php echo substr($f111,0,30); ?></center></td>
    <td align="center"><?php echo $icon?></td>
    <td><center><img src="uploadphoto/<?php echo $f444 ?>" width="auto" height="30"></center></td>
  </tr>
  <?php
  }
  ?>
</table>
<center>
<nav>
  <ul class="pagination">
    <li <?php if($Page==1) echo 'class="disabled"'?>>
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
      <li <?php if($Page==$i) echo 'class="active"'?>><a href="<?php $_SERVER[SCRIPT_NAME]?>?Page=<?php echo $i; ?>"><?php echo $i; $e=$i; ?></a></li>
      <?php
    }
    ?>
    <li <?php if($Page==$Num_Pages) echo 'class="disabled"'?>>
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