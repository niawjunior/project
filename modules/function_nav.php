        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header hidden-sm">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" style="border:1px solid #0B4D61">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar" style="background:#fff"></span>
                    <span class="icon-bar" style="background:#fff"></span>
                    <span class="icon-bar" style="background:#fff"></span>
                    </button>
                    
                    <a class="navbar-brand" href="home.php" onclick="getHome();"><span class="glyphicon glyphicon-home" aria-hidden="true">
                    </span> WATER LEVEL
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">

                       <li id="tab_active_weather"><a href="about.php"><?php echo $_SESSION["strh20"];?></a>
                    </li>
                   <li id="tab_active_research"><a href="howto.php"><?php echo $_SESSION["strh21"];?></a>
                </li>
            </ul>
            <?php  if($_SESSION[ "STATUS"]=="" ) { require_once( "modules/function_login.php"); } else { require_once( "modules/function_loged.php"); } ?>
        </div>
    </div>
</nav>