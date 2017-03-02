<?php
date_default_timezone_set('Asia/Bangkok');
$date = date("d-m-Y");
$time = date("H:i");
?>
<br>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">
        <span class="glyphicon glyphicon-bookmark">
        </span>
        <?echo $_SESSION["strh1"]?> (<?echo $_SESSION["strh2"]?>)  &nbsp;<span class="glyphicon glyphicon-time">
        </span> <?echo $_SESSION["strh3"]?> : <?echo $date." / ".$time?>
        </h3>
        <h3 class="panel-title pull-right ">
        </h3>
      </div>
      <center>
      <div class="panel-body" align="center">
        <div class="row">
          <div class="col-md-12">
            <a href="<?=$_SERVER["PHP_SELF"];?>?Action=Display" class="btn btn-info  btn-lg" role="button"><span class="glyphicon glyphicon-tint"></span> <br/><?echo $_SESSION["strwater"] ?></a>
            <a href="<?=$_SERVER["PHP_SELF"];?>?Action=Multiple" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-globe"></span> <br/><?echo $_SESSION["strmap"]?></a>
            <a href="<?=$_SERVER["PHP_SELF"];?>?Action=Graph" class="btn btn-primary  btn-lg" role="button">
            <span class="glyphicon glyphicon-stats"></span> <br/><?echo $_SESSION["strgraph"]?></a>
            <a href="<?=$_SERVER["PHP_SELF"];?>?Action=News" class="btn btn-warning  btn-lg" role="button"><span class="glyphicon glyphicon-book"></span> <br/><?echo $_SESSION["strreport"]?></a>
            <a href="<?=$_SERVER["PHP_SELF"];?>?Action=Member" class="btn btn-danger  btn-lg" role="button"><span class="glyphicon glyphicon-user"></span> <br/><?echo $_SESSION["strmember"]?></a>
            <a href="<?=$_SERVER["PHP_SELF"];?>?Action=Profile" class="btn btn-primary  btn-lg" role="button"><span class="	glyphicon glyphicon-heart"></span> <br/><?echo $_SESSION["strprofile"]?></a>
            <a href="<?=$_SERVER["PHP_SELF"];?>?Action=Activity" class="btn btn-danger  btn-lg" role="button"><span class="glyphicon glyphicon-calendar"></span> <br/><?echo $_SESSION["stractivity"]?></a>
            <a  href="<?=$_SERVER["PHP_SELF"];?>?Action=Setting" class="btn btn-info  btn-lg" role="button"><span class="glyphicon glyphicon-cog"></span> <br/><?echo $_SESSION["strmore"]?></a>
          </div>
        </div>
      </div>
      </center>
    </div>
  </div>
</div>
<div class="panel panel-primary">
  <div class="panel-body">