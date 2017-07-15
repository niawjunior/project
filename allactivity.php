<?php
  session_start();
	if($_SESSION["STATUS"]=='')
{
  header('Location: 404.php');
  exit();
}
  require_once("config.php");
  require_once("connect.php");
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php 
$objQuery1 = mysqli_query($connect,"SELECT * FROM activity") or die ("Error Query [".$strSQL."]");

$objQuery2 = mysqli_query($connect,"SELECT * FROM activity WHERE user = '".$_GET['user']."'") or die ("Error Query [".$strSQL."]");
$USER = $_GET['user'];
if(isset($_GET['user']))
	{
		$objQuery_NUM = $objQuery2;
	}
else
	{
		$objQuery_NUM = $objQuery1;
	}
$Num_Rows = mysqli_num_rows($objQuery_NUM);
$Per_Page = 20;
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


$connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
$objQuery3 = mysqli_query($connect, "SELECT * FROM activity where user='$USER' ORDER BY ID DESC LIMIT $Page_Start , $Per_Page ");
$objQuery4 = mysqli_query($connect, "SELECT * FROM activity  ORDER BY ID DESC LIMIT $Page_Start , $Per_Page ");
if(isset($_GET['user']))
	{
		$objQuery = $objQuery3;
	}
else
	{
		$objQuery = $objQuery4;
	}
?>
<div class="col-md-12">
<form name="frmMain" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<input type="hidden" name="hdnCmd" value="">
<center><h1><thead>บันทึกกิจกรรมทั้งหมด</thead></h1></center>
<table class="table table-hover" border="0">
  	<tr>
	  <thead class="thead-inverse">
	    <th class="default" width="10%" height="50"> <div align="center"><strong>ชื่อสมาชิก</strong/></div></th>
	    <th class="default" width="9%" height="50"> <div align="center"><strong>เวลา</strong/></div></th>
	    <th class="default" width="15%" height="50"> <div align="center"><strong>วันที่</strong/></th>
	    <th class="default" width="20%" height="50"> <div align="center"><strong>การกระทำ</strong/></div></th>
	    <th class="default" width="50%" height="50"> <div align="center"><strong>*หมายเหตุ/รายละเอียด</strong/></div></th>
	  </thead>
    </tr>
<?php 
while($objResult = mysqli_fetch_array($objQuery))
{
      $f0 = $objResult['ID'];
      $f1 = $objResult['user'];
      $f2 = $objResult['time'];
      $f3 = $objResult['date'];
      $f4 = $objResult['atvt'];
      $f5 = $objResult['note'];
  {
  ?>
  <tr>
	<td ><center><?php echo $f1 ?></center></td>
	<td ><center><?php echo $f2 ?></center></td>
	<td ><center><?php echo $f3 ?></center></td>
	<td ><center><?php echo $f4 ?></center></td>
	<td ><center><?php echo $f5 ?></center></td>
  </tr>
  <?php 
  }
}
  ?>
</table>
  <div align="right">
	  <nav>
	    <ul class="pagination">
	      <li <?php  if($Page==1) echo 'class="disabled"'?>>
	        <a href="<?php $_SERVER[SCRIPT_NAME]?>?Page=1<?php if(isset($_GET['user'])){?>&user=<?php echo $USER?><?php }?>" aria-label="Previous">
	          <span aria-hidden="true">&laquo;</span>
	        </a>
	      </li>
	      <?php 
	      for($i=1;$i<=$Num_Pages;$i++)
		      {
		      if($Page-2>=2 and ($i>2 and $i<$Page-2))
				      {
				      ?>
				      <li><a href="<?php $_SERVER[SCRIPT_NAME]?>?Page=<?php echo $i;?><?php if(isset($_GET['user'])){?>&user=<?php echo $USER?><?php }?>">...</a></li>
				      <?php 
				      $i=$Page-2;
				      }
	      		if($Page+5<=$Num_Pages and ($i>=$Page+3 and $i<=$Num_Pages-2))
	      {
	      ?>
	      <li><a href="<?php $_SERVER[SCRIPT_NAME]?>?Page=<?php echo $i; ?><?php if(isset($_GET['user'])){?>&user=<?php echo $USER?><?php }?>">...</a></li>
	      <?php 
	      $i=$Num_Pages-1;
	      }
	      ?>
	      <li <?php if($Page==$i) echo 'class="active"'?>><a href="<?php $_SERVER[SCRIPT_NAME]?>?Page=<?php echo $i; ?><?php if(isset($_GET['user'])){?>&user=<?php echo $USER?><?php }?>"><?php echo $i; $e=$i; ?></a></li>
	      <?php
	      }
	      ?>
	      <li <?php  if($Page==$Num_Pages) echo 'class="disabled"'?>>
	        <a href="<?php $_SERVER[SCRIPT_NAME]?>?Page=<?php echo $Num_Pages;?><?php if(isset($_GET['user'])){?>&user=<?php echo $USER?><?php }?>" aria-label="Next">
	          <span aria-hidden="true">&raquo;</span>
	        </a>
	      </li>
	    </ul>
	  </nav>
		<a id="back-to-top" href="#" class="btn btn-danger btn-md back-to-top" role="button" title="เลื่อนไปบนสุด" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>
  </div>
</form>
</div>
<?php 
mysqli_close($connect);
?>
</body>
</html>


