        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header hidden-sm">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" style="border:1px solid #0B4D61">
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
                       <li id="tab_active_weather"><a href="about.php">ที่มาและความสำคัญ</a>
                    </li>
                   <li id="tab_active_research"><a href="">วิธีการติดตั้ง/ใช้งาน</a>
                </li>
                
            </ul>
            <?php  if($_SESSION[ "STATUS"]=="" ) { require_once( "modules/function_login.php"); } else { require_once( "modules/function_loged.php"); } ?>
        </div>
    </div>
</nav>