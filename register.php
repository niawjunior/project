<?php
session_start();
require_once("config_home.php");
?>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <link href="css/all.css" rel="stylesheet">
   </head>
   <body class="background">
<?php require_once( "modules/function_nav.php");?>
<div class="container box-shadow " id="main-container" style="margin-top: 50px;">
	<iframe src="function_register.php" width="100%" height="100%" scrolling="no" frameBorder="0">
		</iframe>
</div>
</body>
</html>