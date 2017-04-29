<?php
	require_once("connect.php");
	require_once("config.php");
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/jquery.bdt.css" type="text/css" rel="stylesheet">
<script src="js/jquery.bdt.js" type="text/javascript"></script>
<br>
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
<?php
session_start();
$POST = $_SESSION["USER"];
date_default_timezone_set('Asia/Bangkok');
$date = date("d-m-Y");
$time = date("H:i:s");
$connect = mysqli_connect($host,$user,$pass,$db) or die("เชื่อมต่อไม่สำเร็จ");

if($_POST["hdnCmd"] == "Add")
{

  mysqli_query($connect,"INSERT INTO activity (user,time,date,atvt,note) VALUES  ('$POST','$time',' $date','เพิ่มแผนที่',' เพิ่มข้อมูล | สถานที่ ".$_POST["txtAddh1"]."') ");
  mysqli_query($connect,"UPDATE member SET lastactivity = 'เพิ่มแผนที่ | สถานที่ ".$_POST["txtAddh1"]."'  where user = '$POST'");
  mysqli_query($connect,"UPDATE member SET countatvt = countatvt+1 where user = '$POST'");

$fileupload = $_REQUEST['fileupload'];  
// echo "<pre>";print_r($_FILES['fileupload']['name']);exit();
$upload=$_FILES['fileupload'];
if($upload <> '') 
  { 
    $path="uploadphoto/";  
    $remove_these = array(' ','`','"','\'','\\','/','_');
    $newname = str_replace($remove_these, '', $_FILES['fileupload']['name']);
    $newname = time().'-'.$newname;
    $path_copy=$path.$newname;
    $path_link="uploadphoto/".$newname;

    move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);   
  }

  if($_FILES['fileupload']['name'] =='')
  {
    $objQuery = mysqli_query($connect,"INSERT INTO data (h1,h2,la,lo,deep,url) VALUES ('".$_POST["txtAddh1"]."','".$_POST["txtAddh2"]."','".$_POST["txtAddla"]."','".$_POST["txtAddlo"]."','".$_POST["txtAdddeep"]."','map.jpg')");
  }
  else
  {
      $objQuery = mysqli_query($connect,"INSERT INTO data (h1,h2,la,lo,deep,url) VALUES ('".$_POST["txtAddh1"]."','".$_POST["txtAddh2"]."','".$_POST["txtAddla"]."','".$_POST["txtAddlo"]."','".$_POST["txtAdddeep"]."','$newname')");
  }

}
if($_POST["hdnCmd"] == "Update")
{

  $mysql_query8 = mysqli_query($connect,"SELECT * FROM data WHERE ID = '".$_POST["txtID"]."'");
  while($objResult8 = mysqli_fetch_array($mysql_query8))
  {
    $data1 = $objResult8['ID'];
    $data2 = $objResult8['h1'];
    $data3 = $objResult8['url'];
  }
    mysqli_query($connect,"INSERT INTO activity (user,time,date,atvt,note) VALUES  ('$POST','$time',' $date','แก้ไขแผนที่',' แก้ไขข้อมูล | สถานที่ ".$_POST["txth1"]." | ไอดี $data1') ");
    mysqli_query($connect,"UPDATE member SET lastactivity = 'แก้ไขแผนที่ | สถานที่ ".$_POST["txth1"]."'  where user = '$POST'");
    mysqli_query($connect,"UPDATE member SET countatvt = countatvt+1 where user = '$POST'");
    $fileupload_edit = $_REQUEST['fileupload_edit']; 

    $upload=$_FILES['fileupload_edit'];
    if($upload <> '') 
    {  
        $path="uploadphoto/";  
        $remove_these = array(' ','`','"','\'','\\','/','_');
        $newname = str_replace($remove_these, '', $_FILES['fileupload_edit']['name']);
        $newname = time().'-'.$newname;
        $path_copy=$path.$newname;
        $path_link="uploadphoto/".$newname;
      if(move_uploaded_file($_FILES['fileupload_edit']['tmp_name'],$path_copy))
      {
        $objQuery = mysqli_query($connect,"UPDATE data SET h1 = '".$_POST["txth1"]."',h2 = '".$_POST["txth2"]."',la = '".$_POST["txtla"]."',lo = '".$_POST["txtlo"]."',deep = '".$_POST["txtdeep"]."',url = '$newname' WHERE ID = '".$_POST["txtID"]."'");
      }  
      else
      {
           $objQuery = mysqli_query($connect,"UPDATE data SET h1 = '".$_POST["txth1"]."',h2 = '".$_POST["txth2"]."',la = '".$_POST["txtla"]."',lo = '".$_POST["txtlo"]."',deep = '".$_POST["txtdeep"]."',url = '$data3' WHERE ID = '".$_POST["txtID"]."'");
      }
    }

}
$objQuery3 = mysqli_query($connect,"SELECT * FROM showdata");
while($objResult3 = mysqli_fetch_array($objQuery3))
{
      $f111 = $objResult3['showh1'];
      $f222 = $objResult3['ID'];

}

if($_GET["Action"] == "Use")
{

    $objQuery = mysqli_query($connect,"UPDATE data SET h1 = '".$_POST["txth1"]."',h2 = '".$_POST["txth2"]."',la = '".$_POST["txtla"]."',lo = '".$_POST["txtlo"]."',deep = '".$_POST["txtdeep"]."'WHERE ID = '".$_POST["txtID"]."' ");
  	$objQuery = mysqli_query($connect,"SELECT * FROM data WHERE ID = '".$_GET["ID"]."'");
  while($objResult = mysqli_fetch_array($objQuery))

  {
        $f00 = $objResult['ID'];
        $f11 = $objResult['h1'];
        $f22 = $objResult['h2'];
        $f33 = $objResult['la'];
        $f44 = $objResult['lo'];
        $f55 = $objResult['url'];
        $f66 = $objResult['deep'];
  }
  	$objQuery = mysqli_query($connect,"DELETE FROM showdata WHERE ID = '$f222'");
  	$objQuery = mysqli_query($connect,"INSERT INTO showdata (showh1,showh2,showla,showlo,showurl,showdeep) VALUES  ('$f11','$f22','$f33','$f44','$f55','$f66') ");
    mysqli_query($connect,"UPDATE member SET countatvt = countatvt+1 where user = '$POST'");
    mysqli_query($connect,"INSERT INTO activity (user,time,date,atvt,note) VALUES  ('$POST','$time',' $date','เลือกเป็นแผนที่หลัก',' เลือกใช้ข้อมูล | สถานที่ $f11 | ไอดี $f00') ");
    mysqli_query($connect,"UPDATE member SET lastactivity = 'ใช้เป็นแผนที่หลัก | สถานที่ $f11'  where user = '$POST'");
    header( "location: place.php" );
    exit(0);
}

if($_GET["Action"] == "UnUse")
{
    $objQuery7 = mysqli_query($connect,"SELECT * FROM data WHERE ID = '".$_GET["ID"]."'");

    while($objResult7 = mysqli_fetch_array($objQuery7))

    {
          $f111 = $objResult7['h1'];
    }


    $objQuery8 = mysqli_query($connect,"SELECT * FROM data WHERE h1 = '$f111'");

    while($objResult8 = mysqli_fetch_array($objQuery8))

    {
          $f000 = $objResult8['ID'];
    }

    mysqli_query($connect,"UPDATE member SET countatvt = countatvt+1 where user = '$POST'");
    mysqli_query($connect,"INSERT INTO activity (user,time,date,atvt,note) VALUES  ('$POST','$time',' $date','ยกเลิกเป็นแผนที่หลัก',' ยกเลิกการใช้ข้อมูล | สถานที่ $f111 | ไอดี $f000') ");
    mysqli_query($connect,"UPDATE member SET lastactivity = 'เลิกใช้เป็นแผนที่หลัก | สถานที่ $f111'  where user = '$POST'");

  	$objQuery = mysqli_query($connect,"DELETE FROM showdata WHERE ID = '".$_GET["ID"]."'");
    header( "location: place.php" );
    exit(0);
}

if($_GET["Action"] == "Del")
{
  $mysql_query8 = mysqli_query($connect,"SELECT * FROM data WHERE ID = '".$_GET["ID"]."'");
  while($objResult8 = mysqli_fetch_array($mysql_query8))
  {
    $data1 = $objResult8['ID'];
    $data2 = $objResult8['h1'];
  }
    mysqli_query($connect,"UPDATE member SET countatvt = countatvt+1 where user = '$POST'");
    mysqli_query($connect,"INSERT INTO activity (user,time,date,atvt,note) VALUES  ('$POST','$time',' $date','ลบแผนที่','ลบข้อมูล | สถานที่ $data2 | ไอดี $data1') ");
    mysqli_query($connect,"UPDATE member SET lastactivity = 'ลบแผนที่ | สถานที่ $data2'  where user = '$POST'");



  	$objQuery = mysqli_query($connect,"DELETE FROM data  WHERE ID = '".$_GET["ID"]."'");
}

$objQuery1 = mysqli_query($connect,"SELECT * FROM data");
$objQuery = mysqli_query($connect,"SELECT * FROM data ORDER BY ID DESC ");
?>
<form name="frmMain" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" enctype="multipart/form-data">
<input type="hidden" name="hdnCmd" value="">
<table class="table table-hover"  id="bootstrap-table">
  <tr>
  <thead class="thead-inverse">
    <th class="default" width="20%" height="50"> <div align="center">สถานที่</div></th>
    <th class="default" width="50%" height="50"> <div align="center">คำอธิบาย</div></th>
    <th class="default" width="10%" height="50"> <div align="center">ละติจูด</div></th>
    <th class="default" width="10%" height="50"> <div align="center">ลองติจูด</div></th>
    <th class="default" width="13%" height="50"> <div align="center">ความลึก(ม)</div></th>
    <th class="default" width="5%" height="50"> <div align="center">เลือก</div></th>
    <th class="default" width="5%" height="50"> <div align="center">สถานะ</div></th>
    <th class="default" width="5%" height="50"> <div align="center">แก้ไข</div></th>
    <th class="default" width="5%" height="50"> <div align="center">&nbsp;&nbsp;ลบ&nbsp;&nbsp;</div></th>
</thead>
  </tr>
<?php
while($objResult = mysqli_fetch_array($objQuery))
{
      $f0 = $objResult['ID'];
      $f1 = $objResult['h1'];
      $f2 = $objResult['h2'];
      $f3 = $objResult['la'];
      $f4 = $objResult['lo'];
      $f5 = $objResult['deep'];
?>
<?php
	if($objResult["ID"] == $_GET["ID"] and $_GET["Action"] == "Edit")
	{
  ?>
  <tr>
<td><center>
  <input class="form-control" style="text-align:center;" name="txth1" type="text" value="<?php echo $f1?>">
</center></td>
  <td><center>
  <input class="form-control" style="text-align:center;" name="txth2" type="text" value="<?php echo $f2?>">
</center></td>
  <td><center>
  <input class="form-control" style="text-align:center;" name="txtla" type="text" value="<?php echo $f3?>">
</center></td>
  <td><center>
  <input class="form-control" style="text-align:center;" name="txtlo" type="text" value="<?php echo $f4?>">
</center></td>
  <td><center>
  <input class="form-control" style="text-align:center;" name="txtdeep" type="text" value="<?php echo $f5?>">
</center></td>
<td><center><label class="btn btn-primary btn-file">
    รูปภาพ <input type="file" name="fileupload_edit" id="fileupload_edit" style="display: none;">
</label></center></td>
  <td><center><button name="btnAdd" class="btn btn-success" id="btnUpdate" value="" OnClick="frmMain.hdnCmd.value='Update';frmMain.submit();">บันทึก <span class="glyphicon glyphicon-ok-sign"></button></center></td>
  <td><center><button name="btnAdd" class="btn btn-warning" id="btnCancel" value="" OnClick="window.location='<?php echo $_SERVER["PHP_SELF"];?>?Page=<?php echo $Page?>';">ยกเลิก <span class="glyphicon glyphicon-share-alt"></button></center></td>
    </div></td><td></td>
        <tr><input name="txtID" size="0" type="hidden" id="txtID" value="<?php echo $f0?>"></tr>
  </tr>
  <?
	}
  else
	{
  ?>
  <tr>

  <td><center><a class="text-primary" href="showdata.php?PAGE=<?php echo $f1?>" target="_blank"><?php echo substr($f1,0,50);?></a></center></td>
  <td><center><?php echo substr($f2,0,30); ?></center></td>
  <td><center><?php echo Round($f3,2); ?></center></td>
  <td><center><?php echo Round($f4,2); ?></center></td>
  <td><center><?php echo $f5 ?></center></td>
<?
if($f1==$f111)
{
  $ICON='<span class="glyphicon glyphicon-minus-sign" style="color:#f76c6c"></span>';
  $icon='<span class="glyphicon glyphicon-record" style="color:#7ff97f"></span>';
}
else
{
  $ICON='<span class="glyphicon glyphicon-plus-sign"></span>';
    $icon='<span class="glyphicon glyphicon-record" style="color:#f76c6c"></span>';
  }
?>
<td align="center"><a href="JavaScript:if(confirm('<?if($f1==$f111){$TT='ต้องการยกเลิกการใช้แผนที่หรือไม่?';}else{$TT='ต้องการใช้เป็นแผนที่หลักหรือไม่?';}?><?php echo $TT?>')==true){window.location='<?php echo $_SERVER["PHP_SELF"];?>?Page=<?php echo $Page?>&Action=<?if($f1==$f111){$UU='UnUse';$II=$f222;}else{$UU='Use';$II=$f0;}?><?php echo $UU?>&ID=<?php echo $II?>';}"><?php echo $ICON?></a></td>


  <td align="center"> <?php echo $icon?></td>
<td align="center"><a href="JavaScript:if(confirm('ต้องการจะแก้ไขหรือไม่?')==true){window.location='<?php echo $_SERVER["PHP_SELF"];?>?Page=<?php echo $Page?>&Action=Edit&ID=<?php echo $objResult["ID"];?>';}"> <span class="glyphicon glyphicon-edit"></span></a></td>

  <td align="center"><a href="JavaScript:if(confirm('ต้องการจะลบหรือไม่?')==true){window.location='<?php echo $_SERVER["PHP_SELF"];?>?Action=Del&ID=<?php echo $f0?>';}"> <span class="glyphicon glyphicon-trash"></span></a></td>
  </tr>
  <?php 
	}
  ?>
<?php 
}
?>
  <tr>
  <td><center>
  <input class="form-control" style="text-align:center;" name="txtAddh1" type="text">
</center></td>
  <td><center>
  <input class="form-control" style="text-align:center;" name="txtAddh2" type="text" >
</center></td>
  <td><center>
  <input class="form-control" style="text-align:center;" name="txtAddla" type="text" >
</center></td>
  <td><center>
  <input class="form-control" style="text-align:center;" name="txtAddlo" type="text" >
</center></td>
  <td><center>
  <input class="form-control" style="text-align:center;" name="txtAdddeep" type="number" >
</center></td>
<td><center><label class="btn btn-info btn-file">
    รูปภาพ <input type="file" name="fileupload" id="fileupload" style="display: none;">
</label></center></td>
  <td><center><button name="btnAdd" class="btn btn-success" id="btnAdd" value="" OnClick="frmMain.hdnCmd.value='Add';frmMain.submit();">บันทึก <span class="glyphicon glyphicon-ok-sign"></button></center></td>
  <td><center><button class="btn btn-warning" type = "reset" width="20%" value="">เคลียร์ <span class="glyphicon glyphicon-remove-sign"></button></center></td><td></td>
  </tr>
</table>

</form>
<?php 
mysqli_close($connect);
?>
</body>
</html>

