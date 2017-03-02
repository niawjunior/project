<?php
include "config_home.php";
date_default_timezone_set('Asia/Bangkok');
?>
<?
if($_POST["hdnCmd"] == "Add")
{
$mysql_host = $_POST['host'];
$mysql_username = $_POST['user'];
$mysql_password = $_POST['password'];
error_reporting(E_ERROR | E_PARSE);
$connect = mysqli_connect($mysql_host, $mysql_username, $mysql_password);
if(!$connect)
{
?>
<script>
$(window).load(function()
{
$('#myModal').modal('show');
setTimeout("location.href = 'create_database.php';",3000);
});
</script>
<div class="container">
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">เชื่อมต่อฐานข้อมูลไม่สำเร็จ ชื่อหรือรหัสผ่านไม่ถูกต้อง</h4>
                </div>
                <div class="modal-body">
                    <p>กรุณารอสักครู่..</p>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</div>
<?
}
else
{
$upload=$_FILES['fileupload'];
if($upload <> '')
{   //not select file
//โฟลเดอร์ที่จะ upload file เข้าไป
$path="myBackups/sqlrestore";
$remove_these = array(' ','`','"','\'','\\','/','_');
$newname = str_replace($remove_these, '', $_FILES['fileupload']['name']);
$newname1 = $newname;
$newname = time().'-'.$newname;
$path_copy=$path.$newname;
$path_link="myBackups/sqlrestore".$newname;
function clean($string) {
$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}
$cleanname = clean($newname1);
$cleanname2 = substr($cleanname, 0, -3);
//คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);
$filename = $_FILES['fileupload']['name'];
$mysql_host = $_POST['host'];
$mysql_username = $_POST['user'];
$mysql_password = $_POST['password'];
$mysql_database = $cleanname2;
$connect = mysqli_connect($mysql_host, $mysql_username, $mysql_password);
mysqli_query($connect,"CREATE DATABASE $mysql_database");
$con = mysqli_connect($mysql_host, $mysql_username, $mysql_password,$mysql_database);

}
$templine = '';
// Read in entire file
$lines = file($path.$newname);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
if (substr($line, 0, 2) == '--' || $line == '')
continue;
// Add this line to the current segment
$templine .= $line;
// If it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{
// Perform the query
$create_db = mysqli_query($con,$templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysqli_error() . '<br /><br />');
// Reset temp variable to empty
$templine = '';
}
}
if($create_db)
{
?>
<script>
$(window).load(function()
{
$('#myModal').modal('show');
setTimeout("location.href = 'create_database.php';",3000);
});
</script>
<div class="container">
    <!-- Trigger the modal with a button -->
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">สร้างฐานข้อมูลข้อมูลชื่อว่า <?echo $cleanname2?> เรียบร้อยแล้ว</h4>
                </div>
                <div class="modal-body">
                    <p>กรุณารอสักครู่..</p>
                </div>
                <div class="modal-footer">
                </div>
            </div>
            
        </div>
    </div>
</div>
<?
}
}
}
?>
<br>
<br>
<div class="backup_main">
    <div class="main">
        <fieldset><legend><h2>ลบฐานข้อมูล</h2></legend>
        <form name="delete" id="delete" method="post" action="delete_db.php">
            <div><h3>ชื่อเซิฟเวอร์:</h3><input type="text" class="form-control" name="host_delete" value="localhost" required /></div>
            <div class="cls"></div>
            <div><h3>ชื่อฐานข้อมูล:</h3><input type="text" class="form-control" name="database_delete" value="" required /></div>
            <div class="cls"></div>
            <div><h3>ชื่อผู้ใช้ฐานข้อมูล:</h3><input type="text" class="form-control" name="user_delete" value="" required  /></div>
            <div class="cls"></div>
            <div><h3>รหัสผ่านฐานข้อมูล:</h3><input type="password" class="form-control" name="password_delete" value="" required  /></div>
            <div class="cls"></div>
            <div style="text-align: center;margin-top: 50px"><input onclick="vky(this)" type="submit" id="submit" name="submit" class="btn btn-danger" value="ลบฐานข้อมูล" /></div>
            <div class="cls"></div>
        </form>
    </fieldset>
</div>
</div>
<div class="backup_main">
<div class="main">
    <fieldset><legend><h2>สร้างฐานข้อมูล</h2></legend>
    <form  name="frmMain" method="post" action="<?=$_SERVER["PHP_SELF"];?>" enctype="multipart/form-data">
        <input type="hidden" name="hdnCmd" value="">
        <div><h3>ชื่อเซิฟเวอร์:</h3><input type="text" class="form-control" name="host" value="localhost" required/></div>
        <div class="cls"></div>
        <div><h3>ไฟล์ฐานข้อมูล (*.sql) ชื่อฐานข้อมูลจะตั้งตามชื่อไฟล์:</h3><input type="file" class="form-control" name="fileupload" id="fileupload" value="" required/></div>
        <div class="cls"></div>
        <div><h3>ชื่อผู้ใช้ฐานข้อมูล:</h3><input type="text" class="form-control" name="user" value="" required /></div>
        <div class="cls"></div>
        <div><h3>รหัสผ่านฐานข้อมูล:</h3><input type="password" class="form-control" name="password" value="" required /></div>
        <div class="cls"></div>
        <div style="text-align: center;margin-top: 50px"><input name="btnAdd" OnClick="frmMain.hdnCmd.value='Add';frmMain.submit();" type="submit" id="submit" class="btn btn-success" value="สร้างฐานข้อมูล" /></div>
        <div class="cls">
        </div>
    </form>
</fieldset>
</div>
</div>
<?php
?>
<link rel="stylesheet" type="text/css" href="./css/create_database.css">
</thead></table>