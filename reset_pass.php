<?php
session_start();
require_once("config.php");
?>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="assets/css/all.css" rel="stylesheet">
   </head>
<body class="background">
<?php require_once( "modules/function_nav.php");?>
<div class="container box-shadow " id="main-container" style="margin-top: 50px;">
	<iframe src="function_reset.php" width="100%" height="130%" scrolling="no" frameBorder="0">
	</iframe>
</div>
</body>
</html>
<script>
  $('body').show();
  $('.version').text(NProgress.version);
  NProgress.start();
  setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 1000);
  NProgress.done();
</script>
