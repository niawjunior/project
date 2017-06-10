<?php
require_once ("config.php");
?>
<a href="graph_fillter.php?Action=graph1" type="button" class="btn btn-primary btn-md">20 ครั้งล่าสุด</a>
<a href="graph_fillter.php?Action=graph2" type="button" class="btn btn-primary btn-md">20 ครั้งล่าสุด (ทุกๆ 30 นาที)</a>
<a href="graph_fillter.php?Action=graph3" type="button" class="btn btn-primary btn-md">ย้อนหลัง 1 อาทิตย์</a>
<a href="graph_fillter.php?Action=graph4" type="button" class="btn btn-primary btn-md">ย้อนหลัง 1 เดือน</a>

<?php
if($_GET['Action']=='graph1' or $_GET['Action']==''){
    ?>
    	<h4><li class="glyphicon glyphicon-signal" aria-hidden="true"></li> กราฟแสดงปริมาณน้ำ 20 ครั้งล่าสุด อัพเดททุกครั้งที่มีการเปลี่ยนแปลง</h4>

    <iframe src="graph1.php" width="100%" height="70%" scrolling="no" frameBorder="0">	
	</iframe>
    <?php
}
if($_GET['Action']=='graph2'){
    ?>
    	<h4><li class="glyphicon glyphicon-signal" aria-hidden="true"></li> กราฟแสดงปริมาณน้ำย้อนหลัง 1 วัน แสดงข้อมูลทุกๆ 30 นาที</h4>
    <iframe src="graph2.php" width="100%" height="70%" scrolling="no" frameBorder="0">	
	</iframe>
    <?php
}

if($_GET['Action']=='graph3'){
    ?>
    	<h4><li class="glyphicon glyphicon-signal" aria-hidden="true"></li> กราฟแสดงปริมาณน้ำ ย้อนหลัง 1 อาทิตย์ เวลา(06:00)</h4>
    <iframe src="graph3.php" width="100%" height="70%" scrolling="no" frameBorder="0">	
	</iframe>
    <?php
}
if($_GET['Action']=='graph4'){
    ?>
    	<h4><li class="glyphicon glyphicon-signal" aria-hidden="true"></li> กราฟแสดงปริมาณน้ำ ย้อนหลัง 1 เดือน เวลา(06:00)</h4>
    <iframe src="graph4.php" width="100%" height="70%" scrolling="no" frameBorder="0">	
	</iframe>
    <?php
}
?>
