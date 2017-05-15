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
  <div class="content-section-b">
    <div class="container">
      <div class="row">
                  <div class="col-md-12">
                      <h2 class="section-heading">ที่มาและความสำคัญของปัญหา</h2>
                      <p class="lead">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;การตรวจวัดระดับน้ำในแหล่งน้ำชุมชน ได้มีหน่วยงานที่คอยดูแลตรวจวัดและจัดการปริมาณน้ำที่ปล่อยน้ำออกไปเพื่อให้ประชาชนได้ใช้บริโภคอุปโภค เช่น กรมชลประทาน เป็นต้น  โดยได้มีการใช้คนและเครื่องมือในบันทึกข้อมูล ซึ่งใช้งบประมาณค่อนข้างแพง และต้องใช้ผู้เชียวชาญเฉพาะด้านเข้ามาควบคุม <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จากปัญหาข้างต้น ผู้จัดทำ จึงสนใจสร้าง <FONT COLOR="#0e5064">"ระบบตรวจวัดระดับน้ำในแหล่งชุมชน ผ่านระบบสารสนเทศภูมิศาสตร์"</FONT> เป็นกรณีศึกษาขึ้นมา<br>เพื่อให้เกิดความสะดวกในการวัดและตรวจสอบปริมาณน้ำ โดยสามารถตรวจสอบปริมาณน้ำผ่านทางเว็บไซต์ เพื่อความสะดวกและรวดเร็วในการคาดการณ์<br>และตรวจวัดปริมาณน้ำที่เพิ่มขึ้นหรือลดลง พร้อมทั้งช่วยประหยัดค่าใช่จ่ายในการติดตั้งอุปกรณ์และจ้างบุคลากรได้อีกด้วย</p>
                  </div>
                    <div class="col-lg-5 col-lg-offset-3 col-sm-6">
                      <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                          <li data-target="#myCarousel" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="item active">
                            <img src="img/water2.JPG" alt="Los Angeles">
                          </div>
                          <div class="item">
                            <img src="img/water3.JPG" alt="New York">
                          </div>
                        </div>

                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                          <span class="glyphicon glyphicon-chevron-left"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                          <span class="glyphicon glyphicon-chevron-right"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
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