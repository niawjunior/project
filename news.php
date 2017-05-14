<?php
session_start();
    if($_SESSION["STATUS"]=='')
    {
      header('Location: 404.php');
      exit();
    }
require_once("connect.php");
require_once("config.php");
?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <?php
    $POST = $_SESSION["USER"];
    $connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
    if(isset($_POST["submit"]))
    {
    $fileupload = $_REQUEST['fileupload']; 
    $upload=$_FILES['fileupload'];
    if($upload <> '')
    {
    $path="myfile/";
    $remove_these = array(' ','`','"','\'','\\','/','_');
    $newname = str_replace($remove_these, '', $_FILES['fileupload']['name']);
    $newname = time();
    $path_copy=$path.$newname;
    $path_link="myfile/".$newname;
    move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);
    }
    $objQuery = mysqli_query($connect,"INSERT INTO upload (t2,url,date,postby) VALUES ('".$_POST["txtt2"]."','$newname','".$_POST["txtdate"]."','$POST')");
    mysqli_query($connect,"INSERT INTO activity (user,time,date,atvt,note) VALUES  ('$POST','$time',' $date','เพิ่มรายงาน',' เพิ่มข้อมูล | เรื่อง ".$_POST["txtt2"]."') ");
    mysqli_query($connect,"UPDATE member SET lastactivity = 'เพิ่มรายงาน | เรื่อง ".$_POST["txtt2"]."'  where user = '$POST'");
    mysqli_query($connect,"UPDATE member SET countatvt = countatvt+1 where user = '$POST'");
    }
        if(isset($_POST["submit_edit"]))
    {
    $mysql_query8 = mysqli_query($connect,"SELECT * FROM upload WHERE ID = '".$_POST["txtID"]."'");
    while($objResult8 = mysqli_fetch_array($mysql_query8))
    {
    $data1 = $objResult8['ID'];
    $data2 = $objResult8['t2'];
    $data3 = $objResult8['url'];
    $data4 = $objResult8['postby'];
    }
    $fileupload_edit = $_REQUEST['fileupload_edit']; 

    $upload=$_FILES['fileupload_edit'];
    if($upload <> '')
    { 
    $path="myfile/";
    $remove_these = array(' ','`','"','\'','\\','/','_');
    $newname = str_replace($remove_these, '', $_FILES['fileupload_edit']['name']);
    $newname = time();
    $path_copy=$path.$newname;
    $path_link="myfile/".$newname;
    if(move_uploaded_file($_FILES['fileupload_edit']['tmp_name'],$path_copy))
    {
    $objQuery = mysqli_query($connect,"UPDATE upload SET t2 = '".$_POST["txtt2_edit"]."',url = '$newname',date = '".$_POST["txtdate_edit"]."',postby = '$data4' WHERE ID = '".$_POST["txtID"]."'");
    }
    else
    {
    $objQuery = mysqli_query($connect,"UPDATE upload SET t2 = '".$_POST["txtt2_edit"]."',url = '$data3',date = '".$_POST["txtdate_edit"]."',postby = '$data4' WHERE ID = '".$_POST["txtID"]."'");
    }
    }
    mysqli_query($connect,"INSERT INTO activity (user,time,date,atvt,note) VALUES  ('$POST','$time',' $date','แก้ไขรายงาน',' แก้ไขข้อมูล | เรื่อง ".$_POST["txtt2_edit"]." | ไอดี ".$_POST["txtID"]." ') ");
    mysqli_query($connect,"UPDATE member SET lastactivity = 'แก้ไขรายงาน | เรื่อง ".$_POST["txtt2_edit"]."'  where user = '$POST'");
    mysqli_query($connect,"UPDATE member SET countatvt = countatvt+1 where user = '$POST'");
    }
    if($_GET["Action"] == "Del")
    {
    $mysql_query8 = mysqli_query($connect,"SELECT * FROM upload WHERE ID = '".$_GET["ID"]."'");
    while($objResult8 = mysqli_fetch_array($mysql_query8))
    {
    $data1 = $objResult8['ID'];
    $data2 = $objResult8['t2'];
    $url =   $objResult8['url'];
    }
    mysqli_query($connect,"INSERT INTO activity (user,time,date,atvt,note) VALUES  ('$POST','$time',' $date','ลบรายงาน',' ลบข้อมูล | เรื่อง $data2 | ไอดี $data1') ");
    mysqli_query($connect,"UPDATE member SET lastactivity = 'ลบรายงาน | เรื่อง $data2 '  where user = '$POST'");
    mysqli_query($connect,"UPDATE member SET countatvt = countatvt+1 where user = '$POST'");
    $objQuery = mysqli_query($connect,"DELETE FROM upload WHERE ID = '".$_GET["ID"]."' ");
    define('BACKUP_DIR', './myfile' ) ;
    $file=BACKUP_DIR.DIRECTORY_SEPARATOR.$url;
    if(file_exists($file)){ if(unlink($file));
    }


    }
    $objQuery1 = mysqli_query($connect,"SELECT * FROM member");
    $objQuery = mysqli_query($connect,"SELECT * FROM upload ORDER BY ID DESC ");
    ?>
    <form name="" method="post" action="<?php echo $_SERVER["PHP_SELF"];?> " enctype="multipart/form-data">
      <table class="table table-hover  "  border="0">
        <tr>
          <thead class="thead-inverse">
            <th class="default" width="10%" height="50"> <div align="center"><strong>เรื่อง/ข่าวสาร</strong></div></th>
            <th class="default" width="20%" height="50"> <div align="center"><strong>ไฟล์ประกอบ (PDF)</strong></div></th>
            <th class="default" width="5%" height="50"> <div align="center"><strong>วันที่</strong></div></th>
            <th class="default" width="10%" height="50"> <div align="center"><strong>โดย</strong></div></th>
                      <?php if($_SESSION["status"] == 'ADMIN')
    {
        ?>
            <th class="default" width="5%" height="50"> <div align="center"><strong>แก้ไข</strong></div></th>
            <th class="default" width="5%" height="50"> <div align="center"><strong>ลบ</strong></div></th>
        <?php

    }
    ?>
          </thead>
        </tr>
        <?php 
        while($objResult = mysqli_fetch_array($objQuery))
        {
        $f0 = $objResult['ID'];
        $f2 = $objResult['t2'];
        $f3 = $objResult['url'];
        $f5 = $objResult['date'];
        $f7 = $objResult['postby'];
        ?>
        <?php 
        if($objResult["ID"] == $_GET["ID"] and $_GET["Action"] == "Edit")
        {
        ?>
        <tr>
          <td width="20%"><center><input autofocus="autofocus" class="form-control" type="text" style="text-align:center;" name="txtt2_edit"  value="<?php echo $f2?>" required></center></td>
          <td width="20%"><center><label style="position:relative;" class="btn btn-default btn-file" >
            <input type="file" name="fileupload_edit">
          </label></td>
          <td width="10%"><center><input class="form-control" type="date" style="text-align:center;" name="txtdate_edit"   value="<?php echo $f5?>" required></center></td>
          <td width="14%"><center><input  disabled class="form-control" type="text" style="text-align:center;" name="txtpostby_edit"  value="<?php echo $_SESSION["USER"]?>"></center></td>
          <td><center><button data-toggle="tooltip" title="บันทึกข้อมูล" name="submit_edit" class="btn btn-success" type="" id="submit_edit" value="" >บันทึก <span class="glyphicon glyphicon-ok-sign"></span></button></center></td>
          <td><center><button data-toggle="tooltip" title="ยกเลิก" name="btnAdd" class="btn btn-warning" type="" id="btnCancel" value="" OnClick="window.location='<?php echo $_SERVER["PHP_SELF"];?>?Page=<?php echo $Page?>';">ยกเลิก <span class="glyphicon glyphicon-share-alt"></span></button></td></center>
          <tr><input name="txtID" size="0" type="hidden" id="txtID" value="<?php echo $f0?>"></tr>
        </tr>
        <?php
        }
        else
        {
        ?>
        <tr>
          <td><center><?php echo $f2 ?></center></td>
          <td><center><a href="myfile/<?php echo $f3?>" target="_blank"><?php echo substr($f3, 0, 15)?></a></center></td>
          <td width="10%"><center><?php echo $f5 ?></center></td>
          <td><center><?php echo $f7 ?></center></td>
                                <?php if($_SESSION["status"] == 'ADMIN')
    {
        ?>
          <td align="center"><a data-toggle="tooltip" title="แก้ไขข้อมูล" href="JavaScript:if(confirm('ต้องการจะแก้ไขหรือไม่?')==true){window.location='<?php echo $_SERVER["PHP_SELF"];?>?Page=<?php echo $Page?>&Action=Edit&ID=<?php echo $f0?>';}"> <span class="glyphicon glyphicon-edit"></span></a></td>
          <td align="center"><a data-toggle="tooltip" title="ลบข้อมูล" href="JavaScript:if(confirm('ต้องการจะลบหรือไม่?')==true){window.location='<?php echo $_SERVER["PHP_SELF"];?>?Page=<?php echo $Page?>&Action=Del&ID=<?php echo $f0?>';}"> <span class="glyphicon glyphicon-trash"></span></a></td>

        <?php
    }
    ?>
        </tr>
        <?php
        }
        ?>
        <?php
        }
        ?>
        
      </table>
    </form>
    <?php if($_SESSION["status"] == 'ADMIN')
    {
      if($_GET["Action"] == "Edit")
      {
        $close = 'disabled';
      }
        ?>
        <form name="" method="post" action="<?php echo $_SERVER["PHP_SELF"];?> " enctype="multipart/form-data">
      <table class="table table-hover  "  border="0">
      <tr>
          <td width="20%"><center><input <?php echo  $close;?> class="form-control" type="text" style="text-align:center;" name="txtt2" placeholder="หัวข้อ/ชื่อเรื่อง" required></center></td>
          <td width="30%" ><center><label <?php echo  $close;?> style="position:relative;" class="btn btn-default btn-file" >
            <input <?php echo  $close;?> type="file" name="fileupload" id="fileupload" required>
          </label></td>
          <td><center><input <?php echo  $close;?> class="form-control" type="date" style="text-align:center;" name="txtdate"  required></center></td>
          <td><center><input <?php echo  $close;?> disabled class="form-control" type="text" style="text-align:center;" name="txtpostby" value="<?php echo $_SESSION["USER"]?>"></center></td>
          <td><center><button <?php echo  $close;?> data-toggle="tooltip" title="บันทึกข้อมูล" name="submit" class="btn btn-success"  id="submit" width="20%" value="">บันทึก <span class="glyphicon glyphicon-ok-sign"></button></center></td>
          <td><center><button <?php echo  $close;?> data-toggle="tooltip" title="ล้างข้อมูล" type = "reset" class="btn btn-warning" width="20%" value="">เคลียร์ <span class="glyphicon glyphicon-remove-sign"></button></center></td>
        </tr>
      </table>
     </form>

        <?php

    }
    ?>
    </form>
     
    <?php
    mysqli_close($connect);
    ?>
  </body>
</html>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>