<?php
	/*** By Weerachai Nukitram ***/
	/***  http://www.ThaiCreate.Com ***/

	$strName = $_POST["tName"];
	$strMessage = $_POST["tMessage"];
	

	$strFileName = "thaicreate.txt";

	if($strName != "" and $strMessage != "")
	{	
		//*** Write Text file ***//
		$objFopen = fopen("data/".$strFileName, 'a');
		$strText1 = "$strName say : $strMessage\r\n";
		fwrite($objFopen, $strText1);
		fclose($objFopen);
	}

	//*** Read Text file ***//
	$objFopen = fopen("data/".$strFileName, 'r');
	if ($objFopen) {
	while (!feof($objFopen)) {
	$file = fgets($objFopen, 4096);
	echo $file."<br>";
	}
	fclose($objFopen);
	}

	echo "<div id='mydiv'></div>";
?>