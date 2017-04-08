<?php
$objQuery6 = mysqli_query($connect,"SELECT * FROM member WHERE ID='$ID'");
while($objResult6 = mysqli_fetch_array($objQuery6))
{
$CHECKPHOTO = $objResult6['img'];
}
if($CHECKPHOTO=="")
{
$logoprofile = 'photo/user.png';
}
else
{
$logoprofile = $CHECKPHOTO;
}
if($_SESSION["status"] == "ADMIN")
{
$PAGE = "profile.php";
$PAGE_PROFILE = "profile.php?Action=Profile";
$PAGE_SETTING = "profile.php?Action=Setting";
$type_user ="ผู้ดูแลระบบ";
}
else if ($_SESSION["status"] =="BAN")
{
$PAGE = "404.php";
$PAGE_PROFILE = "404.php";
$PAGE_SETTING = "404.php";
$type_user ="ระงับการใช้งาน";
}
else
{
$PAGE = "profile.php";
$PAGE_PROFILE = "profile.php?Action=Profile";
$PAGE_SETTING = "profile.php?Action=Setting";
$type_user ="ผู้ใช้งานทั่วไป";
}
if($_SESSION["status"] == "ADMIN")
{
?>
<ul class="nav navbar-nav">
  <li id="tab_active_weather"><a href="<?php echo $PAGE_SETTING?>">หน้าจัดการข้อมูล</a></li>
</ul>
<?php 
}
?>
<form id="signin" class="navbar-form navbar-right" role="form" method="post" action="<?php echo $PAGE?>">
  <button class="btn btn-warning">ยินดีต้อนรับคุณ <?php echo $_SESSION["USER"]?>
  <span text-primary>(<?php echo $type_user?>)
  </span >
  <span class="glyphicon glyphicon-cog">
  </span>
  </button>
  <a href="logout.php">
    <button type="button" class="btn btn-danger">LOGOUT
    </button>
  </a>
  <a href="<?php echo $PAGE_PROFILE?>">
    <img src="<?php echo $logoprofile?>" class="img-circle " height ="30" width="30" >
  </a>
</form>