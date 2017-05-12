<?php 
session_start();
$ID = $_SESSION["ID"];
require_once("config.php");
require_once ("connect.php");
?>
<html lang="en">
   <head>
       <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="assets/css/all.css" rel="stylesheet">
      <style>
#container {
	min-width: 320px;
	max-width: 600px;
	margin: 0 auto;
}
</style>
   </head>
   <body class="background">
<?php require_once( "modules/function_nav.php");?>
<div class="container box-shadow " id="main-container" style="margin-top: 50px;">
<br>
<div class="content-section-b">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-heading">ที่มาและความสำคัญของปัญหา</h2>
                    <p class="lead">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;การตรวจวัดระดับน้ำในแหล่งน้ำชุมชน ได้มีหน่วยงานที่คอยดูแลตรวจวัดและจัดการปริมาณน้ำที่ปล่อยน้ำออกไปเพื่อให้ประชาชนได้ใช้บริโภคอุปโภค เช่น กรมชลประทาน เป็นต้น  โดยได้มีการใช้คนและเครื่องมือในบันทึกข้อมูล ซึ่งใช้งบประมาณค่อนข้างแพง และต้องใช้ผู้เชียวชาญเฉพาะด้านเข้ามาควบคุม <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จากปัญหาข้างต้น ผู้จัดทำ จึงสนใจสร้าง <FONT COLOR="#0e5064">"ระบบตรวจวัดระดับน้ำในแหล่งชุมชน ผ่านระบบสารสนเทศภูมิศาสตร์"</FONT> เป็นกรณีศึกษาขึ้นมา<br>เพื่อให้เกิดความสะดวกในการวัดและตรวจสอบปริมาณน้ำ โดยสามารถตรวจสอบปริมาณน้ำผ่านทางเว็บไซต์ เพื่อความสะดวกและรวดเร็วในการคาดการณ์<br>และตรวจวัดปริมาณน้ำที่เพิ่มขึ้นหรือลดลง พร้อมทั้งช่วยประหยัดค่าใช่จ่ายในการติดตั้งอุปกรณ์และจ้างบุคลากรได้อีกด้วย</p>
                </div>
                <div class="col-lg-5 col-lg-offset-3 col-sm-6">
                    <img class="img-responsive img-thumbnail" src="img/water_level.JPG" alt="">
                </div>
            </div>
        </div>
        </div>
<br>
<h2 class="section-heading">ตัวอย่างชิ้นงาน (3D Model)</h2>
<iframe width="100%" height="60%" src="https://sketchfab.com/models/188963cc19044f4b80bf93b26aedec30/embed" frameborder="0" allowvr allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" onmousewheel=""></iframe><br><br><br>
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