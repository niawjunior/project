<?php
session_start();
require_once("connect.php");
require_once("config.php");
date_default_timezone_set('Asia/Bangkok');
$date = date("d-m-Y");
$time = date("H:i:s");
?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <br>
    <script>
    $(document).ready( function () {
    $('#bootstrap-table').bdt();
    });
    </script>
    <script>
    $(document).ready( function () {
    $('#bootstrap-table').bdt({
    showSearchForm: 2,
    showEntriesPerPageField: 0
    });
    });
    </script>
  </head>
  <body>
    <?
    $POST = $_SESSION["USER"];
    $connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");
    if($_POST["hdnCmd"] == "Add")
    {
    $fileupload = $_REQUEST['fileupload']; //รับค่าไฟล์จากฟอร์ม
    //เพิ่มไฟล์
    $upload=$_FILES['fileupload'];
    if($upload <> '')
    {   //not select file
    //โฟลเดอร์ที่จะ upload file เข้าไป
    $path="myfile/";
    $remove_these = array(' ','`','"','\'','\\','/','_');
    $newname = str_replace($remove_these, '', $_FILES['fileupload']['name']);
    $newname = time();
    $path_copy=$path.$newname;
    $path_link="myfile/".$newname;
    //คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
    move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);
    }
    $objQuery = mysqli_query($connect,"INSERT INTO upload (t2,url,date,postby) VALUES ('".$_POST["txtt2"]."','$newname','".$_POST["txtdate"]."','$POST')");
    mysqli_query($connect,"INSERT INTO activity (user,time,date,atvt,note) VALUES  ('$POST','$time',' $date','เพิ่มรายงาน',' เพิ่มข้อมูล | เรื่อง ".$_POST["txtt2"]."') ");
    mysqli_query($connect,"UPDATE member SET lastactivity = 'เพิ่มรายงาน | เรื่อง ".$_POST["txtt2"]."'  where user = '$POST'");
    mysqli_query($connect,"UPDATE member SET countatvt = countatvt+1 where user = '$POST'");
    }
    if($_POST["hdnCmd"] == "Update")
    {
    $mysql_query8 = mysqli_query($connect,"SELECT * FROM upload WHERE ID = '".$_POST["txtID"]."'");
    while($objResult8 = mysqli_fetch_array($mysql_query8))
    {
    $data1 = $objResult8['ID'];
    $data2 = $objResult8['t2'];
    $data3 = $objResult8['url'];
    $data4 = $objResult8['postby'];
    }
    $fileupload_edit = $_REQUEST['fileupload_edit']; //รับค่าไฟล์จากฟอร์ม
    //เพิ่มไฟล์
    $upload=$_FILES['fileupload_edit'];
    if($upload <> '')
    {   //not select file
    //โฟลเดอร์ที่จะ upload file เข้าไป
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
    }
    mysqli_query($connect,"INSERT INTO activity (user,time,date,atvt,note) VALUES  ('$POST','$time',' $date','ลบรายงาน',' ลบข้อมูล | เรื่อง $data2 | ไอดี $data1') ");
    mysqli_query($connect,"UPDATE member SET lastactivity = 'ลบรายงาน | เรื่อง $data2 '  where user = '$POST'");
    mysqli_query($connect,"UPDATE member SET countatvt = countatvt+1 where user = '$POST'");
    $objQuery = mysqli_query($connect,"DELETE FROM upload WHERE ID = '".$_GET["ID"]."' ");
    }
    $objQuery1 = mysqli_query($connect,"SELECT * FROM member");
    $objQuery = mysqli_query($connect,"SELECT * FROM upload ORDER BY ID DESC ");
    ?>
    <form name="frmMain" method="post" action="<?=$_SERVER["PHP_SELF"];?> " enctype="multipart/form-data">
      <input type="hidden" name="hdnCmd" value="">
      <table class="table table-hover  "  border="0" id="bootstrap-table" >
        <tr>
          <thead class="thead-inverse">
            <th class="default" width="30%" height="50"> <div align="center">เรื่อง/ข่าวสาร</div></th>
            <th class="default" width="35%" height="50"> <div align="center">ไฟล์ประกอบ (PDF)</div></th>
            <th class="default" width="5%" height="50"> <div align="center">วันที่</div></th>
            <th class="default" width="10%" height="50"> <div align="center">โดย</div></th>
            <th class="default" width="5%" height="50"> <div align="center">แก้ไข</div></th>
            <th class="default" width="5%" height="50"> <div align="center">ลบ</div></th>
          </thead>
        </tr>
        <?
        while($objResult = mysqli_fetch_array($objQuery))
        {
        $f0 = $objResult['ID'];
        $f2 = $objResult['t2'];
        $f3 = $objResult['url'];
        $f5 = $objResult['date'];
        $f7 = $objResult['postby'];
        ?>
        <?
        if($objResult["ID"] == $_GET["ID"] and $_GET["Action"] == "Edit")
        {
        ?>
        <tr>
          <td><center><input class="form-control" type="text" style="text-align:center;" name="txtt2_edit"  value="<?=$f2?>" ></center></td>
          <td><center><label style="position:relative;" class="btn btn-default btn-file" >
            <input type="file" name="fileupload_edit">
          </label></td>
          <td><center><input class="form-control" type="date" style="text-align:center;" name="txtdate_edit"   value="<?=$f5?>"></center></td>
          <td><center><input  disabled class="form-control" type="text" style="text-align:center;" name="txtpostby_edit"  value="<?echo $_SESSION["USER"]?>"></center></td>
          <td><center><input name="btnAdd" class="btn btn-default" type="button" id="btnUpdate" value="บันทึก" OnClick="frmMain.hdnCmd.value='Update';frmMain.submit();"></td></center>
          <td><center><input name="btnAdd" class="btn btn-default" type="button" id="btnCancel" value="ยกเลิก" OnClick="window.location='<?=$_SERVER["PHP_SELF"];?>?Page=<?=$Page?>';"></td></center>
          <tr><input name="txtID" size="0" type="hidden" id="txtID" value="<?=$f0?>"></tr>
        </tr>
        <?
        }
        else
        {
        ?>
        <tr>
          <td><center><?php echo $f2 ?></center></td>
          <td><center><a href="myfile/<?=$f3?>" target="_blank"><?=substr($f3, 0, 15)?></a></center></td>
          <td><center><?php echo $f5 ?></center></td>
          <td><center><?php echo $f7 ?></center></td>
          <td align="center"><a href="JavaScript:if(confirm('ต้องการจะแก้ไขหรือไม่?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Page=<?=$Page?>&Action=Edit&ID=<?=$f0?>';}"> <span class="glyphicon glyphicon-edit"></span></a></td>
          <td align="center"><a href="JavaScript:if(confirm('ต้องการจะลบหรือไม่?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Page=<?=$Page?>&Action=Del&ID=<?=$f0?>';}"> <span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
        <?
        }
        ?>
        <?
        }
        ?>
        <tr>
          <td><center><input class="form-control" type="text" style="text-align:center;" name="txtt2" ></center></td>
          <td><center><label style="position:relative;" class="btn btn-default btn-file" >
            <input type="file" name="fileupload" id="fileupload" >
          </label></td>
          <td><center><input class="form-control" type="date" style="text-align:center;" name="txtdate"  ></center></td>
          <td><center><input disabled class="form-control" type="text" style="text-align:center;" name="txtpostby" value="<?echo $_SESSION["USER"]?>"></center></td>
          <td><center><input name="btnAdd" class="btn btn-default" type="button" id="btnAdd" width="20%" value="บันทึก" OnClick="frmMain.hdnCmd.value='Add';frmMain.submit();"></td>
          <td><center><input type = "reset" class="btn btn-default" width="20%" value="เคลียร์"></td>
        </tr>
      </table>
    </form>
    <?
    mysqli_close($connect);
    ?>
  </body>
</html>