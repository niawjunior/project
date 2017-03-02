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
$pdf->Cell(20,7,"ID");
$pdf->Cell(30,7,"USER");
$pdf->Cell(30,7,"DATE");
$pdf->Cell(55,7,"TIME");
$pdf->Cell(90,7,"ACTIVITY");
$pdf->Ln();
$pdf->Ln();


 $result = mysqli_query($conn,"SELECT user,time,date,atvt,note FROM activity order by ID DESC");
$i=0;
        while($rows=mysqli_fetch_array($result))
        {
            $i++;
            $user = $rows[0];
            $time = $rows[1];
            $date = $rows[2];
            $atvt = $rows[3];
            $note = $rows[4];
            $pdf->Cell(10,7,iconv('UTF-8', 'TIS-620',$i),1,0,'C');
            $pdf->Cell(30,7,iconv('UTF-8', 'TIS-620',$user),1,0,'C');
            $pdf->Cell(30,7,iconv('UTF-8', 'TIS-620',$time),1,0,'C');
            $pdf->Cell(30,7,iconv('UTF-8', 'TIS-620',$date),1,0,'C');
            $pdf->Cell(90,7,iconv('UTF-8', 'TIS-620',$note),1,0,'C');
            $pdf->Ln(); 
        }

$pdf->Output();
?>