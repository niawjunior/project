<?
session_start();
require_once("config_home.php");
?>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <link href="css/all.css" rel="stylesheet">
      <title>
      WATER LEVEL
      </title>
   </head>
   <body class="background">
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
         <div class="container">
            <div class="navbar-header hidden-sm">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" style="border:1px solid #0B4D61" >
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar" style="background:#fff"></span>
               <span class="icon-bar" style="background:#fff"></span>
               <span class="icon-bar" style="background:#fff"></span>
               </button>
               <a class="navbar-brand" href="home.php" onclick="getHome();">WATER LEVEL
               </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
               <ul class="nav navbar-nav">
                  <li id="tab_active_home">
                     <a href="home.php">
                        <span class="glyphicon glyphicon-home" aria-hidden="true">
                        </span>
                     </a>
                  </li>
                  <li id="tab_active_weather"><a href="">ที่มาและความสำคัญ</a>
               </li>
               <li id="tab_active_research"><a href="">วิธีการติดตั้ง/ใช้งาน</a>
            </li>
         </ul>
         <?
         if($_SESSION["STATUS"]=="")
         {
         require_once("modules/function_login.php");
         }
         else
         {
         require_once("modules/function_loged.php");
         }
         ?>
      </div>
   </div>
</nav>
<div class="container box-shadow " id="main-container" style="margin-top: 50px;">
   <iframe src="function_register.php" width="100%" height="100%" scrolling="no" frameBorder="0">
   </iframe>
</div>
</body>
</html>