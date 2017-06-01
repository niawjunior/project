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
$type_user = $_SESSION["strh19"];
}
else
{
$PAGE = "profile.php";
$PAGE_PROFILE = "profile.php?Action=Profile";
$PAGE_SETTING = "profile.php?Action=Setting";
$type_user =$_SESSION["strh18"];
}
?>
<form id="signin" class="navbar-form navbar-right" role="form" method="post" action="<?php echo $PAGE?>">
  <button class="btn btn-warning"><?php echo $_SESSION["strh17"];?> <?php echo $_SESSION["USER"]?>
  <span text-primary>(<?php echo $type_user?>)
  </span >
  <span class="glyphicon glyphicon-cog">
  </span>
  </button>
  <a href="logout.php">
    <button type="button" class="btn btn-danger"><?php echo $_SESSION["strh16"];?> <span class="glyphicon glyphicon-log-out"></span>
    </button>
  </a>
  <a href="<?php echo $PAGE_PROFILE?>">
    <img src="<?php echo $logoprofile?>" class="img-circle" height ="30" width="30" >
  </a>
</form>
