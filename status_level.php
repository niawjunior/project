<?php
$objQuery4 = mysqli_query($connect,"SELECT * FROM showdata");
$Num_Rows = mysqli_num_rows($objQuery4);
while($objResult4 = mysqli_fetch_array($objQuery4))
{
$showh1 = $objResult4['showh1'];
}
if($showh1=="")
{
$showh1 = 'ไม่ได้เชื่อมต่อ';
}
$objQuery1 = mysqli_query($connect,"SELECT * FROM water_table WHERE place = '$showh1' ORDER BY ID DESC LIMIT 1");
$objQuery3 = mysqli_query($connect,"SELECT * FROM data WHERE h1 = '$showh1' ");
$objQuery5 = mysqli_query($connect,"SELECT * FROM water_table  ORDER BY ID DESC LIMIT 1");
while($objResult3 = mysqli_fetch_array($objQuery3))
{
$showh11 = $objResult3['level'];
}
while($objResult5 = mysqli_fetch_array($objQuery5))
{
$lasttime = $objResult5['time'];
$f44 = $objResult5['date'];
}
while($objResult1 = mysqli_fetch_array($objQuery1))
{
$f55 = $objResult1['level'];
$f66 = $objResult1['deep'];
}
if( count($f55) !==0)
{
if (($f55*100)/$f66>100)
{
$check="เกินความจุ";
}
else if((($f55*100)/$f66>80) and (($f55*100)/$f66<=100))
{
$check="น้ำมาก";
}
else if((($f55*100)/$f66>50) and (($f55*100)/$f66<=80))
{
$check="น้ำปานกลาง";
}
else if((($f55*100)/$f66>30) and (($f55*100)/$f66<=50))
{
$check="น้ำน้อย";
}
else
{
$check="น้ำน้อยวิกฤติ";
}
$persen = ($f55/$f66)*100;
$objQuery2 = mysqli_query($connect,"SELECT * FROM water_table WHERE place = '$showh1' ORDER BY ID DESC ");
$max = 0;
$min = 100;
while($objResult2 = mysqli_fetch_array($objQuery2))
{
$f33 = $objResult2['level'];
if($f33>$max)
{
$max=$f33;
}
if($f33<$min)
{
$min=$f33;
}
}
}
else
{
$max='0';
$min='0';
}
?>