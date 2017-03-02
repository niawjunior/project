<?php
require_once("dbcontroller.php");

require('fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();

$pdf->AddFont('angsa','','angsa.php');
$pdf->SetFont('angsa','',13);	
 $pdf->Cell(50);
 $pdf->Cell(100,7,iconv('UTF-8', 'TIS-620','ระบบตรวจสอบระดับน้ำในแหล่งน้ำชุมชน ผ่านระบบสารสนเทศภูมิศาตร์'),1,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(15,7,"");
$pdf->Cell(20,7,"ID");
$pdf->Cell(40,7,"PLACE");
$pdf->Cell(30,7,"LEVEL");
$pdf->Cell(30,7,"DEEP");
$pdf->Cell(30,7,"TIME");
$pdf->Cell(30,7,"DATE");
$pdf->Ln();
$pdf->Ln();


 $result = mysqli_query($conn,"SELECT place,level,deep,time,date FROM water_table order by ID DESC");
$i=0;
        while($rows=mysqli_fetch_array($result))
        {
            $i++;
            $place = $rows[0];
            $level = $rows[1];
            $deep = $rows[2];
            $time = $rows[3];
            $date = $rows[4];
            $pdf->Cell(15,7,"");
            $pdf->Cell(10,7,iconv('UTF-8', 'TIS-620',$i),1,0,'C');
            $pdf->Cell(40,7,iconv('UTF-8', 'TIS-620',$place),1,0,'C');
            $pdf->Cell(30,7,iconv('UTF-8', 'TIS-620',$level),1,0,'C');
            $pdf->Cell(30,7,iconv('UTF-8', 'TIS-620',$deep),1,0,'C');
            $pdf->Cell(30,7,iconv('UTF-8', 'TIS-620',$time),1,0,'C');
            $pdf->Cell(30,7,iconv('UTF-8', 'TIS-620',$date),1,0,'C');
            $pdf->Ln(); 
        }

$pdf->Output();
?>