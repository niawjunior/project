<!DOCTYPE html>
<html>
<head>
<link href="css/build.css" rel="stylesheet">
  <title></title>
</head>
<body>
<div class="row">
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <form name="form1" method="post" action="save_setting1.php" accept-charset="UTF-8" role="form">
            <fieldset>
              <h4><label><?php echo $_SESSION["strh5"];?></label></h4>
              <h4>
                <div class="radio radio-danger">
                  <input type="radio" name="b1" id="B2" value="B2"/><?php if (isset ($b1) && $b1=="B2")?>
                  <label for="B2"><?php echo $_SESSION["strh10"];?> (PDF)</label></div></h4>
                  <h4>
                    <div class="radio radio-danger">
                      <input type="radio" name="b1" id="B3" value="B3"/><?php if (isset ($b1) && $b1=="B3")?><label for="B3"><?php echo $_SESSION["strh11"];?> (PDF)</label>
                    </div>
                  </h4>
                  <br>
                  <input class="btn btn-sm btn-success " type="submit" value="<?php echo $_SESSION["strh15"];?>">
                </fieldset>
              </form>
            </div>
          </div>
        </div>
        <?php
        if($_SESSION["lang"]=="th")
        {
          $checked1='checked';
        }
        else
        {
          $checked1='';
        }
        if($_SESSION["lang"]=="en")
        {
          $checked2='checked';
        }
        else
        {
          $checked2='';
        }
        if($_SESSION["lang"]=="")
        {
          $checked1='checked';
        }
        ?>
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-body">
              <form name="form1" method="post" action="save_setting2.php" accept-charset="UTF-8" role="form">
                <fieldset>
                  <h4><label><?php echo $_SESSION["strh6"];?></label></h4>
                  <h4><div class="radio radio-danger">
                    <input type="radio" name="d1" id="D2" value="D2" <?php echo $checked1?>/><?php if (isset ($d1) && $d1=="D2")?>
                    <label for="D2"><?php echo $_SESSION["strh8"];?> <img title="th. version" alt="japan" src="photo/fagth.png">
                    </label>
                  </div></h4>
                  <h4>
                    <div class="radio radio-danger">
                      <input type="radio" name="d1" id="D3" value="D3" <?php echo $checked2?>/><?php if (isset ($d1) && $d1=="D3")?>
                      <label for="D3"><?php echo $_SESSION["strh9"];?> <img title="en. version" alt="english" src="photo/fagen.png"></label>
                    </div></h4><br>
                    <input class="btn btn-sm btn-success " type="submit" value="<?php echo $_SESSION["strh15"];?>">
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <h4><label><?php echo $_SESSION["strh7"];?></label></h4>
                <a href="profile.php?Action=Setting?Backup"><h4><span class="glyphicon glyphicon-download-alt"></span> <?php echo $_SESSION["strh12"];?> (SQL)</h4></a>
                <a href="profile.php?Action=Setting?Create"><h4><span class="glyphicon glyphicon-info-sign"></span> <?php echo $_SESSION["strh13"];?></h4></a>
                <a href="profile.php?Action=Setting?Status"><h4><span class="glyphicon glyphicon-flash"></span> <?php echo $_SESSION["strh14"];?></h4></a>
                <br><br>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
          </div>
        </div>
      </div>
</body>
</html>