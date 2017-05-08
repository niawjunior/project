<?php
session_start(); 
?>
<script>	
function date_time_th(id)
{
        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        months = new Array('มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม');
        d = date.getDate();
        day = date.getDay();
        days = new Array('วันจันทร์', 'วันอังคาร', 'วันพุธ', 'วันพฤหัสบดี', 'วันศุกร์', 'วันเสาร์', 'วันอาทิตย์');
        h = date.getHours();
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        result = ''+days[day]+' '+d+' '+months[month]+' '+year+' '+h+':'+m+':'+s;
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time_th("'+id+'");','1000');
        return true;
}
</script>
<script>	
function date_time_en(id)
{
        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
        d = date.getDate();
        day = date.getDay();
        days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        h = date.getHours();
	        if(h<10)
	        {
	                h = "0"+h;
	        }
	        m = date.getMinutes();
	        if(m<10)
	        {
	                m = "0"+m;
	        }
	        s = date.getSeconds();
	        if(s<10)
	        {
	                s = "0"+s;
	        }
        result = ''+days[day]+'   '+d+' '+months[month]+'   '+year+' '+h+':'+m+':'+s;
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time_en("'+id+'");','1000');
        return true;
}
</script>
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
        <?php echo $_SESSION["strh1"]?> (<?php echo $_SESSION["strh2"]?>)  <span class="glyphicon glyphicon-time">
        </span> <?php echo $_SESSION["strh3"]?>
         <body>
         <?php 
         if($_SESSION["lang"] == "th")
         {
			$date_time  = 'date_time_th';
         }
         else if($_SESSION["lang"] == "en")
         {
         	$date_time  = 'date_time_en';
         }
         else
         {
         	$date_time  = 'date_time_th';
         }
         ?>
            <span id="<?php echo $date_time?>"></span>
            <script type="text/javascript">window.onload = <?php echo $date_time?>('<?php echo $date_time?>');</script>
    </body>
        </h3>

        <h3 class="panel-title pull-right ">
        </h3>
      </div>
      <center>
      <div class="panel-body" align="center">
        <div class="row">
          <div class="col-md-12">
            <a href="<?php echo $_SERVER["PHP_SELF"];?>?Action=Display" class="btn btn-info  btn-lg" role="button"><span class="glyphicon glyphicon-tint"></span> <br/><?php echo $_SESSION["strwater"] ?></a>
            <a href="<?php echo $_SERVER["PHP_SELF"];?>?Action=Multiple" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-globe"></span> <br/><?echo $_SESSION["strmap"]?></a>
            <a href="<?php echo $_SERVER["PHP_SELF"];?>?Action=Graph" class="btn btn-primary  btn-lg" role="button">
            <span class="glyphicon glyphicon-stats"></span> <br/><?echo $_SESSION["strgraph"]?></a>
            <a href="<?php echo $_SERVER["PHP_SELF"];?>?Action=News" class="btn btn-warning  btn-lg" role="button"><span class="glyphicon glyphicon-file"></span> <br/><?echo $_SESSION["strreport"]?></a>
            <a href="<?php echo $_SERVER["PHP_SELF"];?>?Action=Member" class="btn btn-danger  btn-lg" role="button"><span class="glyphicon glyphicon-user"></span> <br/><?echo $_SESSION["strmember"]?></a>
            <a href="<?php echo $_SERVER["PHP_SELF"];?>?Action=Profile" class="btn btn-primary  btn-lg" role="button"><span class="	glyphicon glyphicon-heart"></span> <br/><?echo $_SESSION["strprofile"]?></a>
            <a href="<?php echo $_SERVER["PHP_SELF"];?>?Action=Activity" class="btn btn-danger  btn-lg" role="button"><span class="glyphicon glyphicon-calendar"></span> <br/><?echo $_SESSION["stractivity"]?></a>
            <a  href="<?php echo $_SERVER["PHP_SELF"];?>?Action=Setting" class="btn btn-info  btn-lg" role="button"><span class="glyphicon glyphicon-cog"></span> <br/><?echo $_SESSION["strmore"]?></a>
          </div>
        </div>
      </div>
      </center>
    </div>
  </div>
</div>
<div class="panel panel-primary">
<div class="panel-body">