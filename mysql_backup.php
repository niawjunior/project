<?php
include "config_home.php";
date_default_timezone_set('Asia/Bangkok');
error_reporting(E_ALL);
ini_set('display_errors', '1');    // 0 or 1 set 1 if unable to download database it will show all possible errors
ini_set('max_execution_time', 0);  // setting 0 for no time limit
session_start();
define('BACKUP_DIR', './myBackups/sqlbackup' ) ;
if(isset($_GET['task'])&& $_GET['task']=='clear')
{
$file_name=$_GET['file'];
$file=BACKUP_DIR.DIRECTORY_SEPARATOR.$file_name;
if(file_exists($file)){ if(unlink($file)) $rmsg="$file_name ลบข้อมูลเรียบร้อยแล้ว";
}
else { $rmsg="<b>$file_name </b>สร้างไฟล์สำรองข้อมูลเรียบร้อยแล้ว";
}
}
if(isset($_REQUEST['submit'])){
#####################
//CONFIGURATIONS
#####################
// Define the name of the backup directory
$host=trim($_POST['host']);
$user=trim($_POST['user']);
$password=trim($_POST['password']);
$database=trim($_POST['database']);
//if(!empty($host)&&!empty($user)&&!empty($password)&&!empty($database))
// Define  Database Credentials
define('HOST', $host ) ;
define('USER', $user ) ;
define('PASSWORD', $password ) ;
define('DB_NAME', $database ) ;
/*
Define the filename for the sql file
If you plan to upload the  file to Amazon's S3 service , use only lower-case letters
*/
$fileName = 'mysqlbackup--' . date('d-m-Y') . '@'.date('h.i.s').'.sql' ;
// Set execution time limit
if(function_exists('max_execution_time')) {
if( ini_get('max_execution_time') > 0 )     set_time_limit(0) ;
}
// Check if directory is already created and has the proper permissions
if (!file_exists(BACKUP_DIR)) mkdir(BACKUP_DIR , 0700) ;
if (!is_writable(BACKUP_DIR)) chmod(BACKUP_DIR , 0700) ;
// Create an ".htaccess" file , it will restrict direct accss to the backup-directory .
$content = 'Allow from all' ;
$file = new SplFileObject(BACKUP_DIR . '/.htaccess', "w") ;
$file->fwrite($content) ;
error_reporting(E_ERROR | E_PARSE);
$mysqli = new mysqli(HOST , USER , PASSWORD , DB_NAME) ;
if (mysqli_connect_errno())
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
exit();
}
// Introduction information
$return='';
$return .= "--\n";
$return .= "-- A Mysql Backup System \n";
$return .= "--\n";
$return .= '-- Export created: ' . date("Y/m/d") . ' on ' . date("h:i") . "\n\n\n";
$return = "--\n";
$return .= "-- Database : " . DB_NAME . "\n";
$return .= "--\n";
$return .= "-- --------------------------------------------------\n";
$return .= "-- ---------------------------------------------------\n";
$return .= 'SET AUTOCOMMIT = 0 ;' ."\n" ;
$return .= 'SET FOREIGN_KEY_CHECKS=0 ;' ."\n" ;
$tables = array() ;
// Exploring what tables this database has
$result = $mysqli->query('SHOW TABLES' ) ;
// Cycle through "$result" and put content into an array
while ($row = $result->fetch_row())
{
$tables[] = $row[0] ;
}
// Cycle through each  table
foreach($tables as $table)
{
// Get content of each table
$result = $mysqli->query('SELECT * FROM '. $table) ;
// Get number of fields (columns) of each table
$num_fields = $mysqli->field_count  ;
// Add table information
$return .= "--\n" ;
$return .= '-- Tabel structure for table `' . $table . '`' . "\n" ;
$return .= "--\n" ;
$return.= 'DROP TABLE  IF EXISTS `'.$table.'`;' . "\n" ;
// Get the table-shema
$shema = $mysqli->query('SHOW CREATE TABLE '.$table) ;
// Extract table shema
$tableshema = $shema->fetch_row() ;
// Append table-shema into code
$return.= $tableshema[1].";" . "\n\n" ;
// Cycle through each table-row
while($rowdata = $result->fetch_row())
{
// Prepare code that will insert data into table
$return .= 'INSERT INTO `'.$table .'`  VALUES ( '  ;
// Extract data of each row
for($i=0; $i<$num_fields; $i++)
{
$return .= '"'.$mysqli->real_escape_string($rowdata[$i]) . "\"," ;
}
// Let's remove the last comma
$return = substr("$return", 0, -1) ;
$return .= ");" ."\n" ;
}
$return .= "\n\n" ;
}
// Close the connection
$mysqli->close() ;
$return .= 'SET FOREIGN_KEY_CHECKS = 1 ; '  . "\n" ;
$return .= 'COMMIT ; '  . "\n" ;
$return .= 'SET AUTOCOMMIT = 1 ; ' . "\n"  ;
//$file = file_put_contents($fileName , $return) ;
$zip = new ZipArchive() ;
$resOpen = $zip->open(BACKUP_DIR . '/' .$fileName.".zip" , ZIPARCHIVE::CREATE) ;
if( $resOpen ){
$zip->addFromString( $fileName , "$return" ) ;
}
$zip->close() ;
$fileSize = get_file_size_unit(filesize(BACKUP_DIR . "/". $fileName . '.zip')) ;
// Function to append proper Unit after file-size .
}
?>
<br>
<br>
<div class="backup_main">
    <div class="main">
        
        <fieldset><legend><h2>ระบบสำรองข้อมูล</h2></legend>
        <form name="backup" id="backup" method="post">
            <div><h3>ชื่อเซิฟเวอร์:</h3><input type="text" class="form-control" name="host" value="localhost" required/></div>
            <div class="cls"></div>
            <div><h3>ชื่อฐานข้อมูล:</h3><input type="text" class="form-control" name="database" value="" required /></div>
            <div class="cls"></div>
            <div><h3>ชื่อผู้ใช้ฐานข้อมูล:</h3><input type="text" class="form-control" name="user" value="" required/></div>
            <div class="cls"></div>
            <div><h3>รหัสผ่านฐานข้อมูล:</h3><input type="password" class="form-control" name="password" value=""required /></div>
            <div class="cls"></div>
            <div style="text-align: center;margin-top: 50px"><input type="submit" id="getdb" name="submit" class="btn btn-success" value="สร้างไฟล์ข้อมูล" /></div>
            <div class="cls"></div>
        </form>
    </fieldset>
</div>
<div class="backup_list">
    <div class=""><?php echo isset($rmsg)?$rmsg:''; ?></div>
    <?php echo display_download(BACKUP_DIR); ?>
</div>
</div>
<?php
?>
<?php
function get_file_size_unit($file_size){
switch (true) {
case ($file_size/1024 < 1) :
return intval($file_size ) ." Bytes" ;
break;
case ($file_size/1024 >= 1 && $file_size/(1024*1024) < 1)  :
return intval($file_size/1024) ." KB" ;
break;
default:
return intval($file_size/(1024*1024)) ." MB" ;
}
}
function display_download($BACKUP_DIR){
$msg='';
$msg.='
<br><table><thead><tr><th><h3>ชื่อไฟล์</h3></th><th><h3>ขนาด</h3></th><th>&nbsp;</th></tr>
</thead><tbody>';
$downloads=getDownloads($BACKUP_DIR);
if(count($downloads)>0)
foreach ($downloads as $k => $v) {
$msg.= '<tr><td><h4>'.$v['name'].'</h4></td><td><h4>'.$v['size'].'</h4></td><td>
<a class="tooltips" href="'.BACKUP_DIR . "/". $v['name'] .'" target="_blank"><span>คลิกเพื่อดาวน์โหลด</span><img src="photo/128.png" width="15px"/></a>
&nbsp;|&nbsp;<a onclick="return confirm(\'คุณต้องการจะลบหรือไม่ ?\')" class="tooltips" href="mysql_backup.php?task=clear&file='.$v['name'].'"><span>คลิกเพื่อลบ</span><img src="photo/delete-512.png"width="15px"/></a>
</td></tr>';
}
return $msg.='</tbody></table>';
}
function getDownloads($dir="./myBackups/sqlbackup"){
if (is_dir($dir)){
$dh  = opendir($dir);
$files=array();
$i=0;
$xclude=array('.','..','.htaccess');
while (false !== ($filename = readdir($dh))) {
if(!in_array($filename, $xclude))
{
$files[$i]['name'] = $filename;
$files[$i]['size'] = get_file_size_unit(filesize($dir.'/'.$filename));
$i++;
}
}
return $files;
}}?>
<link rel="stylesheet" type="text/css" href="./css/create_database.css">